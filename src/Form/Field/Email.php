<?php

namespace Dcat\Admin\Form\Field;

class Email extends Text
{
    protected $rules = ['nullable', 'email'];

    public function render()
    {
        $this->prepend('<i class="fas fa-envelope"></i>')
            ->type('email');

        return parent::render();
    }
}
