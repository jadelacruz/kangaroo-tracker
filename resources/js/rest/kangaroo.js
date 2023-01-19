'use strict';



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

    insert: function () {
        return $.ajax({
            url: this.route,
            method: 'POST',
            dataType: this.dataType
        })
    },

    delete: function (id) {
        return $.ajax({
            url: this.route + `/${id}`,
            method: 'DELETE',
            dataType: this.dataType
        });
    }

}

export default kangarooRest;