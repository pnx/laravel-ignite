<?php

namespace Ignite\View\Components;

use Illuminate\Support\Arr;
use Illuminate\View\Component;
use Ignite\Helpers;

class Select extends Component
{
    /**
     * Id attribute
     *
     * @var string
     */
    public string $id;

    /**
     * Name attribute
     *
     * @var string
     */
    public string $name;

    /**
     * Value attribute
     *
     * @var string|null
     */
    public ?string $value;

    /**
     * If the input field is required or not.
     *
     * @var bool
     */
    public bool $required;

    /**
     * Display attribute
     *
     * @var string|null
     */
    public ?string $display = null;

    /**
     * Field to fetch as display attribute if option items is array or object.
     *
     * @var string|null
     */
    public ?string $displayField = null;

    /**
     * Placeholder value
     *
     * @var string
     */
    public string $placeholder;

    /**
     * Array of all options
     *
     * @var mixed
     */
    public $options;


	/**
	 * Additional classes applied to dropdown container.
	 */
    public string $dropdown_class;

    /**
     * Create a new component instance.
     *
     * @var array $options
     * @var string $name
     * @var string|null $id
     * @var string|null $value
     * @var string|null $menuItemView
     * @var string|null $displayFormat
     * @return void
     */
    public function __construct($options, string $name, ?string $id = null, ?string $value = null,
                                bool $required = false,
                                string $placeholder = 'Select an option',
                                ?string $displayField = null,
                                string $dropdownClass = '')
    {
        $this->name = $name;
        $this->id = $id ?? $name;
        $this->options = $options;
        $this->value = old($name, $value);
        $this->required = $required;
        $this->placeholder = $placeholder;
        $this->displayField = $displayField;
        $this->dropdown_class = $dropdownClass;
    }

	/**
	 * Initialize the component.
	 */
	public function init($livewire)
	{
		// Check if Livewire is present.
		if ($livewire && class_exists('\Livewire\WireDirective')) {

			// If so. check for wire:model value and set $this->value
			$value = $this->attributes->wire('model')->value();
			if ($value) {
				$value = Arr::get($livewire->all(), $value);

                if (is_object($value) && method_exists($value, 'toString')) {
                    $this->value = $value->toString();
                } else {
                    $this->value = $value;
                }
			}
		}

		// If we have a null value but the field is required.
		// Fetch the first value from options.
		if ($this->value === null && $this->required) {
			$this->value = collect($this->options)->flip()->first();
		}

		// Set display value.
		if ($this->value !== null && isset($this->options[$this->value])) {
			$option = $this->options[$this->value];
			$this->display = $this->getDisplayValue($option);
		} else {
			$this->display = $this->placeholder;
		}
	}

    public function jsonOptions()
    {
        return json_encode((object) [
            'value' => $this->value,
            'display' => $this->display,
            'placeholder' => $this->placeholder,
        ]);
    }

    public function getDisplayValue($option)
    {
        if ((is_array($option) || is_object($option)) && $this->displayField) {
            return Arr::get($option, $this->displayField);
        }
        return $option;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('ignite::select');
    }
}
