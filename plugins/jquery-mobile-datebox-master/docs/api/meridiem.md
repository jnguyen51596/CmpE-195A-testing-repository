---
title: meridiem
short: Name of meridiems, if used
modes: [
	'datebox',
	'timebox',
	'calbox',
	'slidebox',
	'flipbox',
	'timeflipbox',
	'durationbox',
	'durationflipbox'
]
cats: [ 'i18n' ]
relat: "i18n"
layout: api
defval: "array('AM', 'PM']"
dattype: "Array"
dyn: "True"
---

Note: this is a i18n option.  To override for single use, you must use:

{% highlight json %}
{"overrideMeridiem": <Array>}
{% endhighlight %}

For more information on the i18n system, see: [Localizing Datebox]({{site.basesite}}doc/3-2-locale/)



