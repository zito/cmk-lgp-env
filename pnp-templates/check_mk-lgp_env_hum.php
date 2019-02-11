<?php

# Template:	check_mk-lgp_env_hum.php
# Author:	vaclav.ovsik@gmail.com

# DS
#   1 hum

$_WARNRULE = '#FFFF00';
$_CRITRULE = '#FF0000';

$ds_name[1] = "Temperature";
$opt[1] = "--vertical-label '%' --title \"$hostname / $servicedesc\" --upper-limit 101 --lower-limit 0 ";
$def[1] = rrd::def("hum", $RRDFILE[1], $DS[1], "AVERAGE");
$def[1] .= rrd::line1("hum", "#050", "humidity");
$def[1] .= rrd::gprint("hum", array("LAST", "MIN", "MAX", "AVERAGE"), "%3.0lf%%");

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
