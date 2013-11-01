var app = app || {};
app.CategoryManageView = Backbone.View.extend({

    el: '#category',

    events: {
        'click #c_add_category': 'c_add_category',
    },

    initialize: function() {
        this.listenTo(app.Categories, 'add', this.render);
        this.listenTo(app.Categories, 'reset', this.render);

        app.Categories.fetch();
    },

    render: function() {
        var category_select_html = _.template($('#category-select-template').html(), {
            categories : app.Categories.toJSON()
        });
        this.$('#c_category_list').html(category_select_html);
    },

    c_add_category: function( event ) {
        if (!this.$('#c_category_name').val().trim() || !this.$('#c_category_description').val().trim()) {
            return;
        }
        app.Categories.create({
            c_name : this.$('#c_category_name').val().trim(),
            c_description : this.$('#c_category_description').val().trim()
        });
        this.$('#c_category_name').val('');
        this.$('#c_category_description').val('');
    }
});
