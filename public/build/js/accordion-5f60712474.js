!function(o,n,t){var i=o("html, body");o.CBPNTAccordion=function(n,t){this.$el=o(t),this._init(n)},o.CBPNTAccordion.defaults={},o.CBPNTAccordion.prototype={_init:function(n){this.options=o.extend(!0,{},o.CBPNTAccordion.defaults,n),this._config(),this._initEvents()},_config:function(){this.$items=this.$el.find(".cbp-nttrigger")},_initEvents:function(){this.$items.on("click.cbpNTAccordion",function(){var n=o(this).parent();n.hasClass("cbp-ntopen")?n.removeClass("cbp-ntopen"):(n.addClass("cbp-ntopen"),i.scrollTop(n.offset().top))})},destroy:function(){this.$items.off(".cbpNTAccordion").parent().removeClass("cbp-ntopen")}};var c=function(o){n.console&&n.console.error(o)};o.fn.cbpNTAccordion=function(n){if("string"==typeof n){var t=Array.prototype.slice.call(arguments,1);this.each(function(){var i=o.data(this,"cbpNTAccordion");return i?o.isFunction(i[n])&&"_"!==n.charAt(0)?void i[n].apply(i,t):void c("no such method '"+n+"' for cbpNTAccordion instance"):void c("cannot call methods on cbpNTAccordion prior to initialization; attempted to call method '"+n+"'")})}else this.each(function(){var t=o.data(this,"cbpNTAccordion");t?t._init():t=o.data(this,"cbpNTAccordion",new o.CBPNTAccordion(n,this))});return this}}(jQuery,window),$(document).ready(function(){$("#cbp-ntaccordion").cbpNTAccordion()});
//# sourceMappingURL=accordion.js.map