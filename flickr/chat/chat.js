/**
 * @author Juan Mignaco
 */

var objChat = {
	objMaryChat : {
		'name' : 'Mary'
		, 'first' : 'Hi Nicholas, this is Mary from Abank, how may I help you today?'
		, 'second' : 'To reset your password just click on the My details menu . Once you have clicked the menu a new page will appear . Select the link Change password . From this link it will take you to a screen where you can change your password'
	}
	, objMainView : Backbone.View.extend({
		title : 'Webchat'
		, tagName : 'div'
		, class : 'mainChatView'
		, template : $('#chatMainTpl').html()
	})
};
