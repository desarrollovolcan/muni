<?php
function format_money($value): string
{
    return '$' . number_format((float)$value, 0, ',', '.');
}
