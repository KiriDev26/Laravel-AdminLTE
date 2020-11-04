<?php

namespace JeroenNoten\LaravelAdminLte\Components;

class InputDate extends InputGroupComponent
{
    /**
     * The default set of icons for the Tempus Dominus plugin configuration.
     */
    protected $icons = [
        'time'     => 'fas fa-clock',
        'date'     => 'fas fa-calendar-alt',
        'up'       => 'fas fa-arrow-up',
        'down'     => 'fas fa-arrow-down',
        'previous' => 'fas fa-chevron-left',
        'next'     => 'fas fa-chevron-right',
        'today'    => 'fas fa-calendar-check-o',
        'clear'    => 'fas fa-trash',
        'close'    => 'fas fa-times',
    ];

    /**
     * The default set of buttons for the Tempus Dominus plugin configuration.
     */
    protected $buttons = [
        'showClose' => true,
    ];

    /**
     * The Tempus Dominus plugin configuration parameters. Array with
     * key => value pairs, where the key should be an existing configuration
     * property of the plugin.
     *
     * @var array
     */
    public $config;

    /**
     * Create a new component instance.
     * Note this component requires the 'Tempus Dominus' plugin.
     *
     * @return void
     */
    public function __construct(
        $name, $label = null, $size = null, $labelClass = null,
        $topClass = null, $disableFeedback = null, $config = []
    ) {
        parent::__construct(
            $name, $label, $size, $labelClass, $topClass, $disableFeedback
        );

        $this->config = is_array($config) ? $config : [];

        // Setup the default plugin icons option.

        $this->config['icons'] = $this->config['icons'] ?? $this->icons;

        // Setup the default plugin buttons option.

        $this->config['buttons'] = $this->config['buttons'] ?? $this->buttons;
    }

    /**
     * Make the class attribute for the input group item.
     *
     * @param string $invalid
     * @return string
     */
    public function makeItemClass($invalid)
    {
        $classes = ['form-control', 'datetimepicker'];

        if (! empty($invalid) && ! isset($this->disableFeedback)) {
            $classes[] = 'is-invalid';
        }

        return implode(' ', $classes);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('adminlte::components.input-date');
    }
}
