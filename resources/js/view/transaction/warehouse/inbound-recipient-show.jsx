// import Table from "../../components/Table";
import { useTable, usePagination, useSortBy } from "react-table";
import Api from "../../../utils/api";
import Filter from "../../../utils/filter";
import React, { useEffect, useState } from "react";
import ReactDOM from "react-dom";
import ReactTooltip from "react-tooltip";
import TabelFooter from "../../../components/tabel_footer";
import TabelHiddenColumn from "../../../components/table_hidden_column";
import Table from "../../../components/table";
import TableLoading from "../../../components/table_loding";
import TableSearch from "../../../components/table_search";
import { indexOf } from "lodash";

function TransferApprov(props) {
    const api = new Api();
    const filter = new Filter();

    const [rawData, setRawData]         = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock]         = useState(false);
    const [data, setData]               = useState([]);

    useEffect(() => {
        async function getData() {
            api.getInboundRecipientShow(props.grf_code).then((response) => {
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
                accessor: "part_name",
                Cell: (tableProps) => (
                    <>
                        <div className="flex" style={{ minWidth: 200 }}>
                            <div className="flex-1 ">
                                <span className="text-primary text-decoration-none align-middle">
                                    { tableProps.row.original.part_name }
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
                        <span>
                            {tableProps.row.original.inputed_quantity + ` / ` + tableProps.row.original.quantity}
                        </span>
                    </>
                ),
            },
            {
                Header: () => <p className="text-center">ACTION</p>,
                accessor: "action",
                Cell: (tableProps) => {
                    if (props.status != 'delivery_approved') {
                        return (
                            <>
                                <span>-</span>
                            </>
                        );
                    } else {
                        return (
                            <>
                                <button className="btn-input-sn whitespace-nowrap flex items-center text-slate-500" data-tw-toggle="modal"
                                    data-tw-target="#modal-pieces-bulk"
                                    data-partname={ tableProps.row.original.part_name }
                                    data-partid={ tableProps.row.original.part_id }
                                    data-quantity={ tableProps.row.original.quantity }>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                                        className="bi bi-upc-scan w-4 h-4 mr-1" viewBox="0 0 16 16">
                                        <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5zM3 4.5a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7zm2 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-7zm3 0a.5.5 0 0 1 1 0v7a.5.5 0 0 1-1 0v-7z" />
                                    </svg> Input SN 
                                </button>
                            </>
                        );
                    }
                },
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
                </div>
                <div className="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0 flex">
                    <TableSearch
                        className="flex-none"
                        columns={columns}
                        SearchFilter={SearchFilter}
                        resetSearchFilter={resetSearchFilter}
                    />
                </div>
            </div>
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

if (document.getElementById("inboundRecipientShow")) {
    const props = {
        'grf_code': document.getElementById("inboundRecipientShow").dataset.grfcode,
        'status': document.getElementById("inboundRecipientShow").dataset.status
    };

    ReactDOM.render(
        <TransferApprov {...props} />,
        document.getElementById("inboundRecipientShow")
    );
}
