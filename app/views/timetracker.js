var app = app || {};
app.TimeTrackerView = Backbone.View.extend({
    el: '#time',

    timeTemplate: _.template( $('#time-template').html() ),

    events: {
        'click #t_add_slot': 't_add_slot_button',
        'keypress #t_description': 't_add_slot_input',

        'change #t_project': 't_select_project',
        'change #t_category': 't_select_category',
    },

    initialize: function() {
        this.listenTo(app.TimeSlots, 'add', this.addOne);
        this.listenTo(app.TimeSlots, 'reset', this.addAll);

        this.listenTo(app.Categories, 'add', this.updateCategorySelect);
        this.listenTo(app.Categories, 'reset', this.updateCategorySelect);

        this.listenTo(app.Projects, 'add', this.renderProjectSelect);
        this.listenTo(app.Projects, 'reset', this.renderProjectSelect);

        this.listenTo(app.Tasks, 'add', this.renderTaskSelect);
        this.listenTo(app.Tasks, 'reset', this.renderTaskSelect);

        app.TimeSlots.fetch();
    },

    render: function() {
        this.$('#t_main').html(this.timeTemplate({ t_total_slots: 5 }));
    },

    addOne: function( slot ) {
        var view = new app.TimeSlotView({ model: slot });
        $('#time-slot-list').append( view.render().el );
        $('#t_start').val(slot.get('t_end'));
    },

    addAll: function() {
        this.$('#time-slot-list').html('');
        app.TimeSlots.each(this.addOne, this);
    },

    updateCategorySelect: function() {
        var category_select_html = _.template($('#category-select-template').html(), {
            categories : app.Categories.toJSON()
        });
        $('#t_category').html(category_select_html);
    },

    renderProjectSelect: function() {
        var project_select_html = _.template($('#project-select-template').html(), {
            projects : app.Projects.toJSON(),
            category: 'none'
        });
        this.$('#t_project').html(project_select_html);
    },

    renderTaskSelect: function() {
        var task_select_html = _.template($('#task-select-template').html(), {
            tasks : app.Tasks.toJSON(),
            project: 'none'
        });
        this.$('#t_task').html(task_select_html);
    },

    t_add_slot_input: function( event ) {
        if ( event.which !== ENTER_KEY || !this.$t_description.val().trim() ) {
            return;
        }
        this.create_time_slot();
    },

    t_add_slot_button: function( event ) {
        if (!this.$('#t_description').val().trim() ) {
            return;
        }
        this.create_time_slot();
    },

    create_time_slot: function() {
        app.TimeSlots.create( {
            t_start: this.$('#t_start').val().trim(),
            t_end: this.$('#t_end').val().trim(),
            t_duration: parseInt(this.$('#t_duration').val().trim(), 10),
            t_category: this.$('#t_category').val().trim(),
            t_project: this.$('#t_project').val().trim(),
            t_task: this.$('#t_task').val().trim(),
            t_description: this.$('#t_description').val().trim(),
        } );
        this.$('#t_description').val('none');
    },

    t_select_project: function () {
        var task_select_html = _.template($('#task-select-template').html(), {
            tasks : app.Tasks.toJSON(),
            project: this.$('#t_project').val().trim()
        });
        this.$('#t_task').html(task_select_html);
    },

    t_select_category: function () {
        var project_select_html = _.template($('#project-select-template').html(), {
            projects : app.Projects.toJSON(),
            category: this.$('#t_category').val().trim()
        });
        this.$('#t_project').html(project_select_html);
        this.t_select_project();
    }
});
