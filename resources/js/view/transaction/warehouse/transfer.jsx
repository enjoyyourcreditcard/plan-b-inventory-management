import { useTable, usePagination, useSortBy } from "react-table";
import Api from "../../../utils/api";
import Filter from "../../../utils/filter";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../../components/tabel_footer";
import Table from "../../../components/table";
import TabelHiddenColumn from "../../../components/table_hidden_column";
// import Table from "../../components/Table";
import TableLoading from "../../../components/table_loding";
import TableSearch from "../../../components/table_search";

function TransferApprov(props) {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);


    useEffect(() => {
        async function getData() {
            api.getWarehouseTransferApprov(props.grf_code).then((response) => {
                setRawData(response.data.data.transfer_forms);
                setData(response.data.data.transfer_forms);
                console.log(response.data.data.transfer_forms);

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
                Header: "Name",
                accessor: "name",

                Cell: (tableProps) => (
                    <>
                        <div className="flex" style={{ minWidth: 200 }}>
                            <div className="flex-1 ">
                                <span className="text-primary text-decoration-none align-middle">
                                    {tableProps.row.original.part.name}
                                </span>
                            </div>
                        </div>
                    </>
                ),
            },
            {
                Header: "Quantity",
                accessor: "quantity",

                Cell: (tableProps) => (
                    <>
                        <p style={{ minWidth: 300, padding: 0, margin: 0 }}>
                            {tableProps.row.original.quantity}
                        </p>
                    </>
                ),
            },
            // {
            //     Header: "Category",
            //     accessor: "category",
            //     Cell: (tableProps) => (
            //         <>
            //             <div style={{ minWidth: 100 }}>
            //                 <a
            //                     href={
            //                         "/category/" +
            //                         tableProps.row.original.segment.category.id
            //                     }
            //                     className="text-primary"
            //                 >
            //                     {tableProps.row.original.segment.category.name}
            //                 </a>
            //             </div>
            //         </>
            //     ),
            // },
            {
                // Header: `Location `,
                Header: () => <p className="text-center">ACTION</p>,
                accessor: "action",
                Cell: (tableProps) => (
                    <>
                    {
                        tableProps.row.original.part.sn_status == 'SN' ?
                        <button class="btn-input-sn flex items-center text-slate-500" data-tw-toggle="modal"
                            data-tw-target="#modal-pieces-bulk" data-transferformsid={ tableProps.row.original.id }
                            data-grfid={ tableProps.row.original.grf_id } data-partid={ tableProps.row.original.part_id }
                            data-partname={ tableProps.row.original.part.name } data-quantity={ tableProps.row.original.quantity }
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                class="bi bi-upc-scan w-4 h-4 mr-1" viewBox="0 0 16 16">
                                <path
                                    d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                            </svg> Input SN
                        </button>
                        :
                        <button class="btn-input-sn flex items-center text-slate-500" data-tw-toggle="modal"
                            data-tw-target="#modal-non-sn"
                            data-transferformsid={ tableProps.row.original.id }
                            data-grfid={ tableProps.row.original.grf_id }
                            data-partid={ tableProps.row.original.part_id}
                            data-partname={ tableProps.row.original.part.name } 
                            data-quantity={tableProps.row.original.quantity }
                            data-warehouseid={ tableProps.row.original.warehouse_id }
                        >
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check-lg w-4 h-4 mr-1" viewBox="0 0 16 16">
                                <path
                                    d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z" />
                            </svg> Approve
                        </button>
                    }
                    </>
                ),
            },
        ],
        []
    );

    const initialState = {
        hiddenColumns: ["color", "im_code", "orafin_code", "sn_status"],
    };
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
        setPageSize,
        allColumns,
        previousPage,
    } = useTable(
        {
            columns,
            data,
            initialState,
        },
        useSortBy,
        usePagination
    );
    const { pageIndex } = state;
    return (
        <>
            <div className="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2 mb-5">
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
                    {/* <div className="ml-2">
                        <TabelHiddenColumn
                            allColumns={allColumns}
                            className="flex-none"
                        />
                    </div> */}
                </div>
            </div>
            {/* <div className="mt-8">
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
            </div> */}
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

export default TransferApprov;

if (document.getElementById("detail-transfer")) {
    // const propsContainer = document.getElementById("detail-transfer");
    // const props = Object.assign({}, propsContainer.dataset);
    const props = {'grf_code': document.getElementById("detail-transfer").dataset.grfcode};
    ReactDOM.render(
        <TransferApprov {...props} />,
        document.getElementById("detail-transfer")
    );
}
