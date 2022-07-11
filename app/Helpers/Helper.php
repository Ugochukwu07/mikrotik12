<?php

function getSetting(?string $key)
{
    return \App\Models\Settings::firstOrFail()->{$key};
}
