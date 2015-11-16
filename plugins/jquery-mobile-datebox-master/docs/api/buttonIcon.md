---
title: buttonIcon
short: Class of button to use in input element
modes: [
	'datebox',
	'timebox',
	'calbox',
	'slidebox',
	'flipbox',
	'timeflipbox',
	'durationbox',
	'durationflipbox',
	'customflip'
]
cats: [ 'display' ]
relat: "display"
layout: api
defval: "false"
dattype: "String"
dyn: "False"
---

This is the class of the button in the input element.  Any valid ui-icon-&lt;name> is fine. The default
of "false" will cause DateBox to use "ui-icon-calendar" for date based modes, and "ui-icon-clock" for time or duration modes.
