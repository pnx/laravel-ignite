<?php

namespace Ignite;

use Illuminate\Support\Traits\ForwardsCalls;
use Illuminate\Database\Eloquent\Model;
use InvalidArgumentException;

abstract class Resource
{
    use ForwardsCalls;

    /**
     * Current instance of the model.
     */
    protected Model $instance;

    /**
     * The eloquent model class this resource represents.
     */
    public static $model = null;

    /**
     * The field in the model that should be used as the resource id.
     */
    public static $id = 'id';

    /**
     * A field in the model that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'id';

    /**
     * The fields in the model that should be searchable.
     *
     * @var array
     */
    public static $search = [ 'id' ];

    /**
     * Limit the number of rows when querying the resource.
     *
     * @var integer
     */
    public static $query_limit = 15;

    /**
     * Constructor.
     */
    public function __construct($id = null)
    {
        $this->instance = new static::$model;

        if (is_object($id)) {
            if (!($id instanceof static::$model)) {
                $msg = sprintf("Model must be a instance of %s, got %s", static::$model, get_class($id));
                throw new \InvalidArgumentException($msg);
            }
            $this->instance = $id;
        } else if ($id !== null) {
            $this->instance = $this->instance->findOrFail($id);
        }
    }

    /**
     * Get the value that should be displayed to represent the resource.
     *
     * @return string
     */
    public function title()
    {
        return $this->attribute(static::$title);
    }

    /**
     * Get the subtitle that should be displayed.
     *
     * @return string
     */
    public function subtitle()
    {
        return '';
    }

    /**
     * Get the resources thumbnail to be displayed.
     *
     * NOTE: Make sure to escape html from user input as this
     * string is rendered unescaped in views.
     *
     * @return string
     */
    public function thumbnail()
    {
        return null;
    }

    /**
     * Create a new resource with the model instance.
     */
    public function new(Model $instance)
    {
        return new static($instance);
    }

    /**
     * Get an attribute value from the resource.
     */
    public function attribute($field)
    {
        return $this->instance->getAttribute($field) ?? null;
    }

    /**
     * Configure the default query to use.
     */
    public function defaultQuery($query)
    {
        return $query;
    }

    /**
     * Intercept call to Model::query() and apply defaultQuery() and query limit first.
     */
    public static function query()
    {
        $query = static::$model::query()
            ->limit(static::$query_limit);

        return (new static)->defaultQuery($query);
    }

    /**
     * Magic method to get resource attributes.
     */
    public function __get($name)
    {
        return $this->attribute($name);
    }

    /**
     * Forward dynamic method calls to model instance.
     */
    public function __call($method, $arguments)
    {
        return $this->forwardCallTo($this->instance, $method, $arguments);
    }

    /**
     * Forward dynamic static method calls to model.
     */
    public static function __callStatic($method, $arguments)
    {
        return forward_static_call([ static::$model, $method ], ...$arguments);
    }
}
