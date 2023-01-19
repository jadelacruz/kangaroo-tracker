'use strict';

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

const kangarooRest = {
    route   : '/api/kangaroo',
    dataType: 'json', 

    getAll : function () {
        return $.ajax({
            url     : this.route,
            dataType: this.dataType
        });
    },

    getById: function () {
        return $.ajax({
            url     : this.route,
            method  : 'GET',
            dataType: this.dataType
        });
    },

    insert: function (data) {
        return $.ajax({
            url     : this.route,
            method  : 'POST',
            data    : data,
            dataType: this.dataType
        });
    },

    update: function (id, data) {
        return $.ajax({
            url     : this.route + `/${id}`,
            method  : 'PUT',
            data    : data,
            dataType: this.dataType
        });
    },

    delete: function (id) {
        return $.ajax({
            url     : this.route + `/${id}`,
            method  : 'DELETE',
            dataType: this.dataType
        });
    }

}

export default kangarooRest;