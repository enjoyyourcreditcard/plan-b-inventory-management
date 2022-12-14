import moment from "moment";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import { useTable, usePagination, useSortBy } from "react-table";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../../components/tabel_footer";
import Table from "../../../components/table";
import TabelHiddenColumn from "../../../components/table_hidden_column";
import TableLoading from "../../../components/table_loding";
import TableSearch from "../../../components/table_search";
import Api from "../../../utils/api";
import Filter from "../../../utils/filter";

function InboundGiver(props) {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getInboundRecipientIndex(props.warehouse_id).then((response) => {
                setRawData(response.data.data);
                setData(response.data.data);
                setLoadingData(false);
            });
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
                Header: "IRF CODE",
                accessor: "irf_code",
                Cell: (tableProps) => (
                    <>
                        <span className="text-primary text-decoration-none"> { tableProps.row.original.irf_code } </span>
                    </>
                )
            },
            {
                Header: "Status",
                accessor: "status",
                Cell: (tableProps) => {
                    switch (tableProps.row.original.status) {       
                        case 'on_progress':
                            return (
                                <>
                                    <div className="flex items-cetner whitespace-nowrap text-slate-500">
                                        <span className="bg-slate-200 py-1 px-4 rounded-lg"> Waiting for pickup.. </span>
                                    </div>
                                </>    
                            );
                        case 'delivered':
                            return (
                                <>
                                    <div className="flex items-cetner whitespace-nowrap text-emerald-600">
                                        <span className="bg-slate-200 py-1 px-4 rounded-lg"> Picked up </span>
                                    </div>
                                </>    
                            );
                        case 'closed':
                            return (
                                <>
                                    <div className="flex items-cetner whitespace-nowrap text-slate-800">
                                        <span className="bg-slate-200 py-1 px-4 rounded-lg"> Closed </span>
                                    </div>
                                </>    
                            );
                    }
                    
                },
            },
            {
                Header: "Action",
                Cell: (tableProps) => (
                    <>
                        <a className="text-emerald-600 flex items-right underline gap-1 decoration-dotted" href={ `/inbound/recipient/` + tableProps.row.original.irf_code.replaceAll('/', '~') }>
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-box-seam" width="16" height="16" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path d="M12 3l8 4.5v9l-8 4.5l-8 -4.5v-9l8 -4.5"></path>
                                <path d="M12 12l8 -4.5"></path>
                                <path d="M8.2 9.8l7.6 -4.6"></path>
                                <path d="M12 12v9"></path>
                                <path d="M12 12l-8 -4.5"></path>
                            </svg>
                            <span> Pick up </span>
                        </a>
                    </>
                ),
            },
        ],
        []
    );

    const {
        getTableProps,
        getTableBodyProps,
        headerGroups,
        prepareRow,
        page,
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
            data,
        },
        useSortBy,
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            {/* btn btn--primary */}
            <div className="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                {/* <a
                    href="javascript:;"
                    data-tw-toggle="modal"
                    data-tw-target="#superlarge-modal-size-preview"
                    className="btn btn-rounded-primary  shadow-md mr-1 "
                >
                    {" "}
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        className="icon icon-tabler icon-tabler-plus "
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        strokeWidth="2"
                        stroke="currentColor"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                    >
                        <path
                            stroke="none"
                            d="M0 0h24v24H0z"
                            fill="none"
                        ></path>
                        <line x1="12" y1="5" x2="12" y2="19"></line>
                        <line x1="5" y1="12" x2="19" y2="12"></line>
                    </svg>
                    <span>&nbsp;Export Excel&nbsp;</span>
                </a> */}

                <div className="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
                <div className="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
                    <TableSearch
                        className="flex-none"
                        columns={columns}
                        SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter}
                    />
                    <div className="ml-2">
                        <TabelHiddenColumn
                            allColumns={allColumns}
                            className="flex-none"
                        />
                    </div>
                </div>
            </div>

            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page}
            />
            {/* <div className="flex flex-col h-screen">
                <div className="flex-grow overflow-auto">
                    <table className="relative w-full border">
                        <thead>
                            <tr>
                                <th className="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                                <th className="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                                <th className="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                            </tr>
                        </thead>
                        <tbody className="divide-y bg-red-100">
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                                <td className="px-6 py-4 text-center">Column</td>
                            </tr>
                        </tbody>
                       
                    </table>
                </div>
            </div> */}
        </>

        // <div>
        //     <div className="pt-3 ">
        //         <div className="d-flex">
        //             <div>
        //                 {/* TODO: data-bs-target dibikin props */}
        //                 <button data-bs-toggle="modal" data-bs-target="#createPartModal" className="btn btn-primary w-100">
        //                     <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        //                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        //                         <line x1="12" y1="5" x2="12" y2="19"></line>
        //                         <line x1="5" y1="12" x2="19" y2="12"></line>
        //                     </svg>
        //                     New Part
        //                 </button>
        //             </div>

        // <TableSearch
        //     columns={columns}
        //     SearchFilter={SearchFilter}
        //     resetSearchFilter={resetSearchFilter} />

        //             <div className='px-1'></div>
        //             {/* <div className="btn-group h-25 ">
        //                 <button type="button" className=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        //                     <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        //                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        //                         <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
        //                     </svg>
        //                 </button>
        //                 <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
        //                     <button className="dropdown-item" href="#"><input type="checkbox" checked={noStock} onChange={filterNoStock} />&nbsp; No Stock</button>
        //                 </div>
        //             </div> */}
        //             <div className='px-1'></div>

        // <TabelHiddenColumn
        //     allColumns={allColumns} />
        //         </div>
        //     </div>
        //     {loadingData ? (
        //         <TableLoading />
        //     ) : (
        //         <Table
        //             getTableProps={getTableProps}
        //             prepareRow={prepareRow}
        //             getTableBodyProps={getTableBodyProps}
        //             headerGroups={headerGroups}
        //             page={page} />
        //     )}

        //     <TabelFooter
        //         gotoPage={gotoPage}
        //         pageIndex={pageIndex}
        //         pageOptions={pageOptions}
        //         canPreviousPage={canPreviousPage}
        //         previousPage={previousPage}
        //         canNextPage={canNextPage}
        //         nextPage={nextPage} />
        // </div>
    );
}

export default InboundGiver;

if (document.getElementById("inboundRecipient")) {
    const props = {
        'warehouse_id': document.getElementById("inboundRecipient").dataset.warehouseid,
    };

    ReactDOM.render(
        <InboundGiver {...props} />, document.getElementById("inboundRecipient")
    );
}