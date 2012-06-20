<?php

# Template:	check_mk-lgp_env_temp.php
# Author:	vaclav.ovsik@gmail.com

# DS
#   1 temp

$_WARNRULE = '#FFFF00';
$_CRITRULE = '#FF0000';

$ds_name[1] = "Temperature";
$opt[1] = "--vertical-label '°C' --title \"$hostname / $servicedesc\" ";
$def[1] = rrd::def("temp", $RRDFILE[1], $DS[1], "AVERAGE");
$def[1] .= rrd::line1("temp", "#050", "temperature");
$def[1] .= rrd::gprint("temp", array("LAST", "MIN", "MAX", "AVERAGE"), "%3.1lf°C");

if ($WARN[1] != "") {
    $def[1] .= rrd::hrule($WARN[1], $_WARNRULE, "Warning  $WARN[1] \\n");
}      
if ($WARN_MIN[1] != "") {
    $def[1] .= rrd::hrule($WARN_MIN[1], $_WARNRULE, "Warning  (min)  $WARN_MIN[1] \\n");
}      
if ($WARN_MAX[1] != "") {
    $def[1] .= rrd::hrule($WARN_MAX[1], $_WARNRULE, "Warning  (max)  $WARN_MAX[1] \\n");
}
if ($CRIT[1] != "") {
    $def[1] .= rrd::hrule($CRIT[1], $_CRITRULE, "Critical $CRIT[1] \\n");
}
if ($CRIT_MIN[1] != "") {
    $def[1] .= rrd::hrule($CRIT_MIN[1], $_CRITRULE, "Critical (min)  $CRIT_MIN[1] \\n");
}
if ($CRIT_MAX[1] != "") {
    $def[1] .= rrd::hrule($CRIT_MAX[1], $_CRITRULE, "Critical (max)  $CRIT_MAX[1] \\n");
}
?>
