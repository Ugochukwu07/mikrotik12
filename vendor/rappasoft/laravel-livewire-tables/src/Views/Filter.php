<?php

namespace Rappasoft\LaravelLivewireTables\Views;

/**
 * Class Filter.
 */
class Filter
{
    public const TYPE_SELECT = 'select';

    /**
     * @var string
     */
    public string $name;

    /**
     * @var string
     */
    public string $type;

    /**
     * @var array
     */
    public array $options = [];

    /**
     * Filter constructor.
     *
     * @param string $name
     */
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    /**
     * @param string $name
     *
     * @return Filter
     */
    public static function make(string $name): Filter
    {
        return new static($name);
    }

    /**
     * @param array $options
     *
     * @return $this
     */
    public function select(array $options = []): Filter
    {
        $this->type = self::TYPE_SELECT;

        $this->options = $options;

        return $this;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function options(): array
    {
        return $this->options;
    }

    /**
     * @return bool
     */
    public function isSelect(): bool
    {
        return $this->type === self::TYPE_SELECT;
    }
}
