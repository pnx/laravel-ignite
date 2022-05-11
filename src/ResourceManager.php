<?php

namespace Ignite;

use Illuminate\Support\Str;
use Illuminate\Contracts\Container\BindingResolutionException;

class ResourceManager
{
    /**
     * Class namespace where resources are located.
     *
     * @var string
     */
    protected string $namespace = "\\App\\Ignite";

    /**
     * Set the class namespace
     *
     * @param string $namespace
     * @return ResourceManager
     */
    public function setNamespace(string $namespace)
    {
        $this->namespace = $namespace;
        return $this;
    }

    /**
     * Get the class namespace
     *
     * @return string
     */
    public function getNamespace() : string
    {
        return $this->namespace;
    }

    /**
     * Make a new resource
     *
     * @param string $resource
     * @return \Ignite\Resource
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function make($resource) : Resource
    {
        $classes = [
            $this->namespace . "\\" . Str::studly($resource),
            $this->namespace . "\\" . Str::studly($resource . '_resource'),
            'resource.' . $resource,
        ];

        foreach($classes as $class) {

            try {
                return app()->make($class);
            } catch(BindingResolutionException $ex) {
                // Skip.
            }
        }

        $msg = sprintf("Failed to load resource '%s': None of [%s] could be constructed from the service container.",
            $resource, join(', ', $classes));

        throw new BindingResolutionException($msg);
    }
}
