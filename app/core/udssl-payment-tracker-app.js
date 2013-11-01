var app = app || {};
var ENTER_KEY = 13;
$(function() {
    app.Payments = new Payments();
    app.Categories = new Categories();
    app.Projects = new Projects();
    app.Tasks = new Tasks();

    new app.PaymentTrackerView();
});
