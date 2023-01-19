'use strict';

const dataGridConfiguration = (keyId, dataSource, events) => {
    return {
        ...events,
        dataSource: dataSource,
        keyExpr: keyId,
        columns: [
            { 
                dataField: 'name',
                caption: 'Name'
            },
            { 
                dataField: 'birth_date',
                caption: 'Birthday'
            },
            { 
                dataField: 'weight',
                caption: 'Weight (kg)'
            },
            { 
                dataField: 'height',
                caption: 'Height (inches)'
            },
            { 
                dataField: 'nature',
                caption: 'Friendliness'
            }
        ],
        paging: {
            pageSize: 10
        },
        pager: {
            visible: true,
            allowedPageSizes: [5, 10, 20],
            showPageSizeSelector: true,
            showInfo: true,
            showNavigationButtons: true,
        },
        filterRow: {
            visible: true,
            applyFilter: 'auto',
        },
        searchPanel: {
            visible: true,
            width: 240,
            placeholder: 'Search...',
        },
        headerFilter: {
            visible: true,
        },
        showBorders: true,
        selection: {
            mode: 'single'
        },
    }
};

export default dataGridConfiguration;