'use strict';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const kangarooRest = {
    route   : '/api/kangaroo',

    getAll : function () {
        return $.ajax({
            url     : this.route,
            dataType: 'json',

        });
    },

    insert: function (data) {
        return $.ajax({
            url     : this.route,
            method  : 'POST',
            data    : data,
            dataType: 'json',

        });
    },

    update: function (data) {
        return $.ajax({
            url     : this.route + `/${data.id}`,
            method  : 'PUT',
            data    : data,
            dataType: 'json',

        });
    },

    delete: function (id) {
        return $.ajax({
            url     : this.route + `/${id}`,
            method  : 'DELETE',
            dataType: 'json',
        });
    }

}

export default kangarooRest;