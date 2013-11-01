var app = app || {};
app.ProjectManageView = Backbone.View.extend({

    el: '#project',

    events: {
        'click #p_add_project': 'p_add_project',
        'change #p_category_list': 'p_select_category',
    },

    initialize: function() {
        this.listenTo(app.Projects, 'add', this.render);
        this.listenTo(app.Projects, 'reset', this.render);

        this.listenTo(app.Categories, 'add', this.renderCategories);
        this.listenTo(app.Categories, 'reset', this.renderCategories);

        app.Projects.fetch();
    },

    render: function() {
        var project_select_html = _.template($('#project-select-template').html(), {
            projects : app.Projects.toJSON(),
            category: 'none'
        });
        $('#p_project_list').html(project_select_html);
    },

    renderCategories: function() {
        var category_select_html = _.template($('#category-select-template').html(), {
            categories : app.Categories.toJSON()
        });
        this.$('#p_category_list').html(category_select_html);
    },

    p_add_project: function( event ) {
        if (!this.$('#p_project_name').val().trim() || !this.$('#p_project_description').val().trim()) {
            return;
        }
        app.Projects.create({
            p_category : this.$('#p_category_list').val().trim(),
            p_name : this.$('#p_project_name').val().trim(),
            p_description : this.$('#p_project_description').val().trim()
        });
        this.$('#p_project_name').val('');
        this.$('#p_project_description').val('');
    },

    p_select_category: function () {
        var project_select_html = _.template($('#project-select-template').html(), {
            projects : app.Projects.toJSON(),
            category: this.$('#p_category_list').val().trim()
        });
        this.$('#p_project_list').html(project_select_html);
    }
});
