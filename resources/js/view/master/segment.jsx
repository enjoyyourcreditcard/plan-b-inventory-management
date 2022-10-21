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

function Segments() {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getSegment().then((response) => {
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

    // const columns = React.useMemo(
    //     () => [
    //         {
    //             Header: "Name",
    //             accessor: "name",
    //             // style: { maxWidth: 10 },

    //             Cell: (tableProps) => (
    //                 <>
    //                     {/* <ReactTooltip place="right" effect="solid" backgroundColor="rgba(255, 355, 255,0)" getContent={(img) =>
    //                         <img src={"/" + tableProps.row.original.img} />} /> */}

    //                     {/* <div id="thumbwrap" >
    //                         <div className='d-flex'>
    //                             <div style={{ minWidth: 40 }} className="pr-1">
    //                                 <a data-tip={tableProps.row.original.name}>
    //                                     <img src={"/" + tableProps.row.original.img} alt="" width={30} height={25} style={{ border: "1px solid #CCCCEE" }} />
    //                                 </a>
    //                             </div>
    //                             </div> */}

    //                     <div class="flex" style={{ minWidth: 200 }}>
    //                         <div class="flex-none pr-5">
    //                             <img
    //                                 src={"/dist/" + tableProps.row.original.img}
    //                                 alt=""
    //                                 width={30}
    //                                 data-action="zoom"
    //                                 height={25}
    //                                 // style={{ border: "1px solid #CCCCEE" }}
    //                             />
    //                         </div>
    //                         <div class="flex-1 ">
    //                             <a
    //                                 href={"/part/" + tableProps.row.original.id}
    //                                 className="text-primary text-decoration-none align-middle"
    //                                 // style={{fontSize:"12px"}}
    //                             >
    //                                 {" "}
    //                                 {tableProps.row.original.name}
    //                             </a>
    //                         </div>
    //                     </div>
    //                     {/* <img src={"/dist/" + tableProps.row.original.img} alt="" width={30} height={25} style={{ border: "1px solid #CCCCEE" }} />

    //                     <a
    //                         href={"/part/" + tableProps.row.original.id}
    //                         className="text-primary text-decoration-none "
    //                     >
    //                         {" "}
    //                         {tableProps.row.original.name}
    //                     </a> */}

    //                     {/* </div> */}
    //                     {/* </div> */}
    //                 </>
    //             ),
    //         },
    //         {
    //             Header: "Description",
    //             accessor: "description",

    //             Cell: (tableProps) => (
    //                 <>
    //                     <p style={{ minWidth: 300, padding: 0, margin: 0 }}>
    //                         {tableProps.row.original.description}
    //                     </p>
    //                 </>
    //             ),
    //         },
    //         {
    //             Header: "Category",
    //             accessor: "category",
    //             Cell: (tableProps) => (
    //                 <>
    //                     <div style={{ minWidth: 100 }}>
    //                         <a
    //                             href={
    //                                 "/category/" +
    //                                 tableProps.row.original.segment.category.id
    //                             }
    //                             className="text-primary"
    //                         >
    //                             {tableProps.row.original.segment.category.name}
    //                         </a>
    //                     </div>
    //                 </>
    //             ),
    //         },
    //         {
    //             Header: "Segment",
    //             accessor: "segment",
    //             Cell: (tableProps) => (
    //                 <>
    //                     <div style={{ minWidth: 100 }}>
    //                         <a
    //                             href={
    //                                 "/segment/" +
    //                                 tableProps.row.original.segment.id
    //                             }
    //                             className="text-primary"
    //                         >
    //                             {tableProps.row.original.segment.name}
    //                         </a>
    //                     </div>
    //                 </>
    //             ),
    //         },
    //         {
    //             Header: "Brand",
    //             accessor: "brand",
    //             Cell: (tableProps) => (
    //                 <>
    //                     <a href="#" className="text-primary">
    //                         {tableProps.row.original.brand.name}
    //                     </a>
    //                 </>
    //             ),
    //         },
    //         {
    //             Header: "Stock",
    //             accessor: "stocks_count",
    //             Cell: (tableProps) => (
    //                 <>
    //                     <a href="#" className="text-primary ">
    //                         {tableProps.row.original.stocks_count}
    //                     </a>

    //                     {/* {tableProps.row.original.stocks_count < 1 ?

    //                         <svg xmlns="http://www.w3.org/2000/svg" class="text-danger icon icon-tabler icon-tabler-alert-triangle" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
    //                             <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
    //                             <path d="M12 9v2m0 4v.01"></path>
    //                             <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75"></path>
    //                         </svg>

    //                         : <></>} */}
    //                 </>
    //             ),
    //         },
    //         ,
    //         {
    //             Header: "SN Status",
    //             accessor: "sn_status",
    //         },
    //         ,
    //         {
    //             Header: "Color",
    //             accessor: "color",
    //         },
    //         {
    //             Header: "IM Code",
    //             accessor: "im_code",
    //         },
    //         ,
    //         {
    //             Header: "Orafin Code",
    //             accessor: "orafin_code",
    //         },
    //         {
    //             // Header: `Location `,
    //             Header: () => <p className="text-center">ACTION</p>,
    //             accessor: "action",
    //             Cell: (tableProps) => (
    //                 <>
    //                     <div className="border-l-2">
    //                         <div
    //                             class="flex justify-center items-center"
    //                             style={{ minWidth: 200 }}
    //                         >
    //                             <a
    //                                 class="flex items-center mr-3"
    //                                 href="javascript:;"
    //                             >
    //                                 <svg
    //                                     xmlns="http://www.w3.org/2000/svg"
    //                                     width="24"
    //                                     height="24"
    //                                     viewBox="0 0 24 24"
    //                                     fill="none"
    //                                     stroke="currentColor"
    //                                     stroke-width="2"
    //                                     stroke-linecap="round"
    //                                     stroke-linejoin="round"
    //                                     icon-name="check-square"
    //                                     data-lucide="check-square"
    //                                     class="lucide lucide-check-square w-4 h-4 mr-1"
    //                                 >
    //                                     <polyline points="9 11 12 14 22 4"></polyline>
    //                                     <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
    //                                 </svg>{" "}
    //                                 Edit
    //                             </a>
    //                             <a
    //                                 class="flex items-center text-danger"
    //                                 href="javascript:;"
    //                                 onClick={() => {
    //                                     window.history.replaceState(
    //                                         null,
    //                                         null,
    //                                         "?part_id=" +
    //                                             tableProps.row.original.id
    //                                     );
    //                                 }}
    //                                 data-tw-toggle="modal"
    //                                 data-tw-target="#part-delete-confirmation-modal"
    //                                 data-id="2"
    //                             >
    //                                 <svg
    //                                     xmlns="http://www.w3.org/2000/svg"
    //                                     width="24"
    //                                     height="24"
    //                                     viewBox="0 0 24 24"
    //                                     fill="none"
    //                                     stroke="currentColor"
    //                                     stroke-width="2"
    //                                     stroke-linecap="round"
    //                                     stroke-linejoin="round"
    //                                     icon-name="trash-2"
    //                                     data-lucide="trash-2"
    //                                     class="lucide lucide-trash-2 w-4 h-4 mr-1"
    //                                 >
    //                                     <polyline points="3 6 5 6 21 6"></polyline>
    //                                     <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
    //                                     <line
    //                                         x1="10"
    //                                         y1="11"
    //                                         x2="10"
    //                                         y2="17"
    //                                     ></line>
    //                                     <line
    //                                         x1="14"
    //                                         y1="11"
    //                                         x2="14"
    //                                         y2="17"
    //                                     ></line>
    //                                 </svg>{" "}
    //                                 Delete
    //                             </a>
    //                         </div>
    //                     </div>
    //                 </>
    //             ),
    //         },
    //     ],
    //     []
    // );

    const columns = React.useMemo(

        () => [

            {

                //Add this line to the column definition
                Header: 'Name',
                accessor: 'name',
                // style: { 'maxWidth': 10 },//Add this line to the column definition
                Cell: tableProps => (
                    <>
                            <a href='#' className="text-primary text-decoration-none " > &nbsp;{tableProps.row.original.name}</a>
                    </>
                )
            }, 
            {
                Header: 'Category',
                accessor: 'category',
                Cell: tableProps => (
                    <>

                        <a href='#' className='text-primary '>{tableProps.row.original.category.name}</a>
                    </>

                )

            },
            {
                Header: 'Total Part',
                accessor: 'total_part',
                Cell: tableProps => (
                    <>
                        <a href='#' className='text-primary '>{tableProps.row.original.parts_count}</a>
                    </>

                )

            },

            {
                            // Header: `Location `,
                            Header: () => <p className="text-center">ACTION</p>,
                            accessor: "action",
                            Cell: (tableProps) => (
                                <>
                                    <div className="border-l-2">
                                        <div
                                            class="flex justify-center items-center"
                                            style={{ minWidth: 200 }}
                                        >
                                            <a
                                                class="flex items-center mr-3"
                                                href="javascript:;"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    icon-name="check-square"
                                                    data-lucide="check-square"
                                                    class="lucide lucide-check-square w-4 h-4 mr-1"
                                                >
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                                </svg>{" "}
                                                Edit
                                            </a>
                                            <a
                                                class="flex items-center text-danger"
                                                href="javascript:;"
                                                onClick={() => {
                                                    window.history.replaceState(
                                                        null,
                                                        null,
                                                        "?part_id=" +
                                                            tableProps.row.original.id
                                                    );
                                                }}
                                                data-tw-toggle="modal"
                                                data-tw-target="#part-delete-confirmation-modal"
                                                data-id="2"
                                            >
                                                <svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    width="24"
                                                    height="24"
                                                    viewBox="0 0 24 24"
                                                    fill="none"
                                                    stroke="currentColor"
                                                    stroke-width="2"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    icon-name="trash-2"
                                                    data-lucide="trash-2"
                                                    class="lucide lucide-trash-2 w-4 h-4 mr-1"
                                                >
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path d="M19 6v14a2 2 0 01-2 2H7a2 2 0 01-2-2V6m3 0V4a2 2 0 012-2h4a2 2 0 012 2v2"></path>
                                                    <line
                                                        x1="10"
                                                        y1="11"
                                                        x2="10"
                                                        y2="17"
                                                    ></line>
                                                    <line
                                                        x1="14"
                                                        y1="11"
                                                        x2="14"
                                                        y2="17"
                                                    ></line>
                                                </svg>{" "}
                                                Delete
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
            <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
                <a
                    href="javascript:;"
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
                    <span>&nbsp;Create Segment&nbsp;</span>
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

export default Segments;

if (document.getElementById("master-segment")) {
    ReactDOM.render(<Segments />, document.getElementById("master-segment"));
}
