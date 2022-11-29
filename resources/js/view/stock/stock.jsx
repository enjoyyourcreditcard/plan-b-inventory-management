import React, { useEffect, useState } from "react";
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
// import moment from 'moment';
import moment from 'moment'

function Stock() {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getStock().then((response) => {
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
        // console.log(search);
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
            accessor: 'part_name',
            Cell: tableProps => (
                <div style={{ "minWidth": 300 }}>
                   
                    <div id="thumbwrap" style={{ "minWidth": 300 }} >
                        <a href={"/part/" + tableProps.row.original.id} className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.name}</a>
                    </div>
                </div>
            )
        },
      
        {
            Header: 'Brand',
            accessor: 'brand',
            Cell: tableProps => (
                <p>{tableProps.row.original.brand.name}</p>
            )
        },
        {

            Header: 'Stock',
            accessor: 'stock',
            Cell: tableProps => (
                <p>{tableProps.row.original.stock}</p>
            )
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
        state,
        canNextPage,
        setPageSize,
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
            {/* btn btn--primary */}
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <a
                    href="/inbound"
                    data-tw-toggle="modal"
                    data-tw-target="#superlarge-modal-size-preview"
                    class="btn btn-rounded-primary  shadow-md mr-1 "
                >
                    {" "}
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="icon icon-tabler icon-tabler-plus "
                        width="24"
                        height="24"
                        viewBox="0 0 24 24"
                        stroke-width="2"
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
                    <span>&nbsp;Add Stock&nbsp;</span>
                </a>

                <div class="hidden md:block mx-auto text-slate-500">
                    {/* Showing 1 to 10 of 150 entries */}
                </div>
                <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
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
            <div className="mt-8">
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
            </div>
            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page}
            />
            {/* <div class="flex flex-col h-screen">
                <div class="flex-grow overflow-auto">
                    <table class="relative w-full border">
                        <thead>
                            <tr>
                                <th class="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                                <th class="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                                <th class="sticky top-0 px-6 py-3 text-red-900 bg-red-300">
                                    Header
                                </th>
                            </tr>
                        </thead>
                        <tbody class="divide-y bg-red-100">
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr> <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                            </tr>
                            <tr>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
                                <td class="px-6 py-4 text-center">Column</td>
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
        //                 <button data-bs-toggle="modal" data-bs-target="#createPartModal" class="btn btn-primary w-100">
        //                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
        //             {/* <div class="btn-group h-25 ">
        //                 <button type="button" class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
        //                     <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-filter" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
        //                         <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        //                         <path d="M5.5 5h13a1 1 0 0 1 .5 1.5l-5 5.5l0 7l-4 -3l0 -4l-5 -5.5a1 1 0 0 1 .5 -1.5"></path>
        //                     </svg>
        //                 </button>
        //                 <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        //                     <button class="dropdown-item" href="#"><input type="checkbox" checked={noStock} onChange={filterNoStock} />&nbsp; No Stock</button>
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

export default Stock;

if (document.getElementById("page-stock")) {
    ReactDOM.render(<Stock />, document.getElementById("page-stock"));
}
