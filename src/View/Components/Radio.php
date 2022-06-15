<?php

namespace Ignite\View\Components;

class Radio extends AbstractInput
{
    use Traits\Livewire;

    /**
     * Array of all options
     *
     * @var array
     */
    public array $options;

    /**
     *
     */
    public bool $required;

    /**
     * Create a new component instance.
     *
     * @var string $name
     * @var array $options
     * @var string|null $id
     * @var string $type
     * @var string|null $value
     * @var bool $disabled
     * @var bool $required
     * @return void
     */
    public function __construct(string $name, array $options, ?string $id = null, ?string $value = '', bool $disabled = false, bool $required = false)
    {
        $this->required = $required;
        $this->options = $options;

        $this->init($name, $id, $value, $disabled);
    }

    public function bootstrap($livewire)
    {
        $this->initLivewire($livewire);

        // If we have a null value but the field is required.
		// Fetch the first value from options.
		if ($this->value === null && $this->required) {
			$this->value = collect($this->options)->flip()->first();
		}
    }

    public function jsonOptions()
    {
        return json_encode((object) [
            'value' => $this->value
        ]);
    }

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        return view('ignite::radio');
    }
}
