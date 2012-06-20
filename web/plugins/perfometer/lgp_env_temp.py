#!/usr/bin/python
# -*- encoding: utf-8; py-indent-offset: 4 -*-
# vim:sta:si:sw=4:sts=4:et:
# +------------------------------------------------------------------+
# |             ____ _               _        __  __ _  __           |
# |            / ___| |__   ___  ___| | __   |  \/  | |/ /           |
# |           | |   | '_ \ / _ \/ __| |/ /   | |\/| | ' /            |
# |           | |___| | | |  __/ (__|   <    | |  | | . \            |
# |            \____|_| |_|\___|\___|_|\_\___|_|  |_|_|\_\           |
# |                                                                  |
# | Copyright Mathias Kettner 2012             mk@mathias-kettner.de |
# +------------------------------------------------------------------+
#
# The Check_MK official homepage is at http://mathias-kettner.de/check_mk.
#
# check_mk is free software;  you can redistribute it and/or modify it
# under the  terms of the  GNU General Public License  as published by
# the Free Software Foundation in version 2.  check_mk is  distributed
# in the hope that it will be useful, but WITHOUT ANY WARRANTY;  with-
# out even the implied warranty of  MERCHANTABILITY  or  FITNESS FOR A
# PARTICULAR PURPOSE. See the  GNU General Public License for more de-
# ails.  You should have  received  a copy of the  GNU  General Public
# License along with GNU Make; see the file  COPYING.  If  not,  write
# to the Free Software Foundation, Inc., 51 Franklin St,  Fifth Floor,
# Boston, MA 02110-1301 USA.

# Check has been developed using a Emerson Network Power
# Manufacturer			Liebert Corporation
# Device Model			Liebert HIMOD
# Device Firmware Version	PAL 1.04.029.STD
# Agent Type			IntelliSlot Web Card
# Agent App Firmware Version	3.210.0
# Agent App Firmware Label	IS-WEBLBDS_HID7_3.210.0_046175
# Agent Boot Firmware Version	3.210.0
# Agent Boot Firmware Label	IS-WEBLBDS_HID7_3.210.0_046175
# Agent Hardware ID		7
#
# +------------------------------------------------------------------+
# | This file has been contributed by:                               |
# |                                                                  |
# | Václav Ovsík <vaclav.ovsik@gmail.com>             Copyright 2012 |
# +------------------------------------------------------------------+

def perfometer_check_mk_lgp_env_temp(row, check_command, perf_data):
    info = row["service_plugin_output"]
    temp = int(perf_data[0][1])
    color = '#00ff00'
    if info.startswith('WARN'):
        color = '#ffff00'
    if info.startswith('CRIT'):
        color = '#ff0000'
    return (str(temp) + '°C'), perfometer_logarithmic(temp, 21, 1.2, color)

perfometers['check_mk-lgp_env_temp'] = perfometer_check_mk_lgp_env_temp
