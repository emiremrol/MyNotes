<?php

namespace Core\DataBinder;

interface DataBinderInterface
{
    public function bind(array $formData, $className);
}