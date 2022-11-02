import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useSortBy,useGlobalFilter } from 'react-table'
import ReactTooltip from 'react-tooltip';
import TabelFooter from '../../../components/tabel_footer';
import Table from '../../../components/table'
import TabelHiddenColumn from '../../../components/table_hidden_column';
import TableLoading from '../../../components/table_loding';
import TableSearch from '../../../components/table_search';
import Api from '../../../utils/api';
import Filter from '../../../utils/filter';

function Stock(props) {
    const api = new Api;
    const filter = new Filter;

    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const [noStock, setNoStock] = useState(false);
    const [data, setData] = useState([]);

    useEffect(() => {
        async function getData() {
            api.getStockByGRF(props.grfcode).then((response) => {
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
        let result = filter.noStock(noStock,rawData);
        setData(result);
        setNoStock(!noStock);
    }

    
    function SearchFilter(search, column) {
        let result = filter.search(search,column,rawData);
        setData(result);
    }

    function resetSearchFilter() {
        setData(rawData);
    }

    const columns = React.useMemo(

        () => [
            , {
                Header: 'MATERIAL DESCRIPTION',
                accessor: 'name'

            }, {
                Header: 'QUANTITY',
                accessor: 'size'
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
        useGlobalFilter,
    } = useTable(
        {
            columns,
            data,
            initialState: { pageSize: 7 }
            // initialState

        },
        useSortBy, usePagination
    )
    const { pageIndex } = state
    return (
        <div className='intro-y box p-5 s'>
            <div className="">
                <div className=" mb-3">
                    <label className='mb-2'><b>Search:</b></label>
                    <input type="text" class="form-control" placeholder="Search…"  onChange={(e) => (SearchFilter(e.target.value,"name"))} />
                </div>
            </div>
            {loadingData ? (
                <TableLoading />
            ) : (
                <div className="table-responsive mb-3">
                <table {...getTableProps()} className="table table-borderless" >
                    <thead >
                        {headerGroups.map(headerGroup => (
                            <tr {...headerGroup.getHeaderGroupProps()}>
                                {headerGroup.headers.map(column => (
                                    <th class="w-1" {...column.getHeaderProps(column.getSortByToggleProps())}><b>{column.render('Header')}</b>
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
                                    </th>
                                ))}
                            </tr>
                        ))}
                    </thead>
                    <tbody {...getTableBodyProps()}>
                        
                        {page.map((row, i) => {
                        prepareRow(row)
                            return (
                                <tr {...row.getRowProps()} >
                                    {row.cells.map(cell => {
                                            return <td {...cell.getCellProps()} className="align-middle">{cell.render('Cell')}</td>
                                    })}
                                </tr>
                            )
                        })}
                    </tbody>
                </table>
            </div>
            
            )}


            {/* <TabelFooter
                gotoPage={gotoPage}
                pageIndex={pageIndex}
                pageOptions={pageOptions}
                canPreviousPage={canPreviousPage}
                previousPage={previousPage}
                canNextPage={canNextPage}
                nextPage={nextPage} /> */}
        </div>
    );
}

export default Stock;

if (document.getElementById('transaction-stock-sidebar')) {
    const propsContainer = document.getElementById("transaction-stock-sidebar");
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(<Stock  {...props} />, document.getElementById('transaction-stock-sidebar'));
}
