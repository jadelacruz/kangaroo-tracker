'use strict';

const kangarooSchema = {
    name      : 'required|min:5|max:25',
    nickname  : 'min:5|max:10',
    gender    : ['required', 'regex:/^[mf]{1}$/'],
    nature    : ['present', 'regex:/^(f|nf)?$/'],
    weight    : 'required|numeric|min:1',
    height    : 'required|numeric|min:1',
    color     :  'min:2|max:50',
    birth_date: 'required|date'
};

export default kangarooSchema;