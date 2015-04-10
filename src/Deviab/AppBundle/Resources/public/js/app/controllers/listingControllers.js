app.controller("PanelController",function($scope) {
	this.tab=1; //initiate at the time of refresh or first loading.

	this.selectTab = function(setTab) {
		this.tab = setTab;
	};
	this.isSelected = function(checkTab) {
		return this.tab === checkTab;
	};
});







