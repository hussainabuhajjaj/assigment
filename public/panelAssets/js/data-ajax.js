"use strict";
// Class definition
var datatable;
var KTDatatableRemoteAjaxDemo = function () {
    // Private functions

    // basic demo
    var demo = function () {

        datatable = $('.kt-datatable').KTDatatable({
            // datasource definition
            data: {
                type: 'remote',
                source: {
                    read: {
                        url: window.data_url,
                        // sample custom headers
                        // headers: {'x-my-custokt-header': 'some value', 'x-test-header': 'the value'},
                        map: function (raw) {
                            // sample data mapping
                            var dataSet = raw;

                            if (typeof raw.data !== 'undefined') {
                                dataSet = raw.data;
                            }

                            return dataSet;
                        },
                        method: 'GET',
                    },
                },
                pageSize: 10,
                serverPaging: true,
                serverFiltering: true,
                serverSorting: true,
                columnDefs: window.columnDefs,
                saveState :{
                    cookie : false,
                    webstorage :false,
                }
            },
            stateSave: false,

            translate: {
                records: {
                    processing: 'جاري التحميل...',
                    noRecords: 'لا توجد نتائج'
                },
                toolbar:{

                    pagination:{
                        items:{
                            default: {
                                first: 'الأول',
                                prev: 'السابق',
                                next: 'التالي',
                                last: 'الأخير',
                                more: 'المزيد',
                                input: 'رقم الصفحة',
                                select: 'حدد عدد العناصر'
                            },
                            info: 'عرض {{start}} - {{end}} من {{total}} السجلات'
                        }
                    }
                }
            },
            // layout definition
            layout: {
                scroll: false,
                footer: false,
            },

            // column sorting
            sortable: true,

            pagination: true,

            search: {
                input: $('#generalSearch'),
            },

            // columns definition
            columns: window.columns,

        });


    };

    return {
        // public functions

        init: function () {
            demo();

        },
    };
}();

jQuery(document).ready(function () {
    KTDatatableRemoteAjaxDemo.init();
});
