var init = {
	updateTimeBar: function() {
		var timeBar = TK.$('time-bar');
		var localTime = TK.time();
		timeBar.innerHTML = TK.date(localTime);
		var setTime = function() {
			localTime = localTime + 1000;
			timeBar.innerHTML = TK.date(localTime, true);
			setTimeout(setTime, 1000);
		};
		setTimeout(setTime, 1000);
	},
	bindMenuList : function() {
		TK.$('user-menu').byNodePop(TK.$('user-name'),1);
	},
	bindEvent : function() {
		$(document.body).addListener('click', clickEvent.eventRouter);	
	}
};

var clickEvent = {
	eventRouter : function(e) {
		var element = TK.getEventNode(e);
		
	}
	
};

var TKRouter = {
	importModule : function(file) {
		TK.loadJSFile(file, true);	
	},
	controllerList : [],
	register : function(func) {
		this.controllerList.push(func);	
	},
	importMethod : function(obj) {
		for(var i in obj) {
			this.register(obj[i]);
		}	
	},
	Init : function() {
		for(var i in this.controllerList) {
			this.controllerList[i]();	
		}
	}
};

TK.ready(function() {
	TKRouter.importMethod(init);
	TKRouter.Init();
});
