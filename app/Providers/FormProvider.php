<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class FormProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Form::macro(
            'editor',
            function ($name, $value, $attributes) {
                $label = $attributes['label'] ?? false;
                $value = $this->getValueAttribute('content', $value);

                return view('components.form.editor', compact('value', 'name', 'label'));
            }
        );

        Form::macro(
            'basicInput',
            function ($name, $value, $attributes) {
                $label       = $attributes['label'] ?? false;
                $type        = $attributes['type'] ?? 'text';
                $required    = $attributes['required'] ?? false;
                $value       = $this->getValueAttribute('content', $value);
                $placeholder = $attributes['placeholder'] ?? false;

                if ($type == 'password' || $type == 'file') {
                    return view(
                        'components.form.basic-input-password',
                        compact('value', 'name', 'label', 'required', 'type')
                    );
                }

                return view(
                    'components.form.basic-input',
                    compact('value', 'name', 'label', 'required', 'type', 'placeholder')
                );
            }
        );

        Form::macro(
            'basicCheckbox',

            function ($name, $value, $attributes) {
                $label = $attributes['label'] ?? false;
                $value = $this->getValueAttribute('content', $value) ?? false;

                return view('components.form.basic-checkbox', compact('value', 'name', 'label'));
            }
        );
    }
}
