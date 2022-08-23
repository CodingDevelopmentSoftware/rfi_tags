<?php
function public_back_end_path($url)
{
    return base_url('public_html/back_end/' . $url);
}

function view_back_end_path($path)
{
    return  "html/back_end_view/" . $path;
}


function public_front_end_path($url)
{
    return base_url('public_html/front_end/' . $url);
}

function view_front_end_path($path)
{
    return  "html/front_end_view/" . $path;
}
