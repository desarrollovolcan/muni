<?php
function format_date(?string $date): string
{
    if (!$date) return '';
    return date('d-m-Y', strtotime($date));
}
