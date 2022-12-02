import React, { useEffect, useState } from "react";
import moment from "moment";
import ReactDOM from "react-dom";
import { useTable, usePagination, useSortBy } from "react-table";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../components/tabel_footer";
import Table from "../../components/table.jsx";
import TabelHiddenColumn from "../../components/table_hidden_column";
import TableLoading from "../../components/table_loding";
import TableSearch from "../../components/table_search";
import Api from "../../utils/api";
import Filter from "../../utils/filter";

function MasterVendor() {
    const api = new Api;
    const filter = new Filter;
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);
    // const csrfToken = $('meta[name="csrf-token"]').attr('content');

    useEffect(() => {
        async function getData() {
            api.getVendor().then((response) => {
                console.log('tes')
                console.log(response.data.data)
                setRawData(response.data.data)
                setData(response.data.data);
                setLoadingData(false);
            })
        }
        if (loadingData) {
            getData();
        }
    }, []);

    function filterNoStock() {
        let result = filter.noStock(noStock, rawData);
        setData(result);
        setNoStock(!noStock);
    }

    function SearchFilter(search, column) {
        console.log(column);
        let result = filter.search(search, column, rawData);
        setData(result);
    }

    function resetSearchFilter() {
        setData(rawData);
    }

    const columns = React.useMemo(

        () => [

            {
                Header: 'Name',
                accessor: 'name',
                Cell: tableProps => (
                    <>
                            <p style={{ minWidth: 200 }}>{tableProps.row.original.name}</p>
                    </>
                )
            },         
            {
                Header: 'Start At',
                accessor: 'start at',
                Cell: tableProps => (
                    <>
                        <p>{moment(tableProps.row.original.start_at).format("DD-MM-Y HH:mm")}</p>
                    </>

                )
            },
            {
                Header: 'End At',
                accessor: 'end at',
                Cell: tableProps => (
                    <>
                        <p>{moment(tableProps.row.original.end_at).format("DD-MM-Y HH:mm")}</p>
                    </>

                )
            },
            {
                Header: 'Status',
                accessor: 'status',
                Cell: tableProps => (
                    <>
                        <p className="capitalize">{tableProps.row.original.status}</p>
                    </>

                )
            },
            {
                Header: () => <p className="text-center">ACTION</p>,
                accessor: "action",
                Cell: (tableProps) => (
                    <>
                        <div className="border-l-2">
                            <div class="flex justify-center items-center" style={{ minWidth: 200 }}>
                                <a class="flex items-center mr-3" href={"/vendor/edit/" + tableProps.row.original.id}>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" icon-name="check-square" data-lucide="check-square"
                                        class="lucide lucide-check-square w-4 h-4 mr-1">
                                        <polyline points="9 11 12 14 22 4"></polyline>
                                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                    </svg>
                                    Edit
                                </a>
                            </div>
                        </div>
                    </>
                ),
            },

        ],
        []
    )
  
    const {
        getTableProps,
        getTableBodyProps,
        headerGroups,
        prepareRow,
        page,
        setPageSize,
        state,
        canNextPage,
        pageSize,
        gotoPage,
        canPreviousPage,
        pageOptions,
        nextPage,
        allColumns,
        previousPage,
    } = useTable(
        {
            columns,
            data        },
        useSortBy,
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <a href="/vendor/create" class="btn btn-rounded-primary  shadow-md mr-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus " width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>&nbsp;Create Vendor&nbsp;</span>
                </a>

                <div class="hidden md:block mx-auto text-slate-500">

                </div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
                    <TableSearch className="flex-none" columns={columns} SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter} />
                    <div className="ml-2">
                        <TabelHiddenColumn allColumns={allColumns} className="flex-none" />
                    </div>
                </div>
            </div>
            <TabelFooter
                    gotoPage={gotoPage}
                    previousPage={previousPage}
                    nextPage={nextPage}
                    pageIndex={pageIndex}
                    canPreviousPage={canPreviousPage}
                    canNextPage={canNextPage}
                    setPageSize={setPageSize}
                    pageOptions={pageOptions}
                />
            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page}
            />
        </>
    );
}

export default MasterVendor;

if (document.getElementById("master-vendor")) {
    ReactDOM.render(<MasterVendor />, document.getElementById("master-vendor"));
}
