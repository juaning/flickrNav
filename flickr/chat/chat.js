/**
 * @author Juan Mignaco
 */

var objChat = {
	objMaryChat : {
		'name' : 'Mary'
		, 'first' : 'Hi Nicholas, this is Mary from Abank, how may I help you today?'
		, 'second' : 'To reset your password just click on the My details menu . Once you have clicked the menu a new page will appear . Select the link Change password . From this link it will take you to a screen where you can change your password'
	}
	, ChatModel : Backbone.Model.extend({})
	
	, ChatCollection : Backbone.Collection.extend({
		model : ChatModel
	})
	
	, MainView : Backbone.View.extend({
		title : 'Webchat'
		, tagName : 'div'
		, className : 'mainChatView'
		, template : $('#chatMainTpl').html()
		, render : function(){
			var tpl = Handlebars.compile(this.template);
			var html = tpl(this.model);
			this.$el.html(html);
			// Print collection here
		}
	})
	
	, ChatView : Backbone.View.extend({
		tagName : 'div'
		, className : 'chatText'
		, template : $('#chatBalloonTpl').html()
		, render : function() {
			var tpl = Handlebars.compile(this.template);
			var html = tpl(this.model);
			this.$el.html(html);
		}
	})
	
	, ToolbarView : Backbone.View.extend({
		tagName : 'div'
		, className : 'chatToolbar'
		, template : $('#chatToolbarTpl').html() 
		, render : function() {
			var tpl = Handlebars.compile(this.template);
			var html = tpl(this.model);
			this.$el.html(html);
		}
	})
};
