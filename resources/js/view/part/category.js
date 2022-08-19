import React from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter, useSortBy } from 'react-table'
import TabelFooter from '../../components/tabel_footer';
import Table from '../../components/Table';
import TabelHiddenColumn from '../../components/table_hidden_column';
import TableSearch from '../../components/table_search';
function Category() {

    const data = React.useMemo(
        () => [
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
            {
                name: "Electronics",
                description: "Small plastic enclosure, black	",
                part_count: 0,
            },
        ],
        []
    )

    const columns = React.useMemo(

        () => [
            {
                Header: 'Name',
                accessor: 'name',

            },
            {
                Header: 'Description',
                accessor: 'description',

                Cell: tableProps => (
                    <>
                        <p style={{ "minWidth": 300 }}>{tableProps.row.original.description}</p>
                        {/* <a href='#' className="text-primary">{tableProps.row.original.category}</a> */}
                    </>

                )

            }, {
                Header: 'Parts',
                accessor: 'part_count',
                Cell: tableProps => (
                    <>
                        <a href='#' className='text-primary '>{tableProps.row.original.part_count}</a>
                    </>

                )

            }
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
        setGlobalFilter
    } = useTable(
        {
            columns,
            data
        },
        useGlobalFilter, useSortBy, usePagination
    )
    const { globalFilter, pageIndex } = state
    return (
        <div>
            <div className="pt-3 ">
                <div className="d-flex">
                  

                    <TableSearch
                        globalFilter={globalFilter}
                        setGlobalFilter={setGlobalFilter} />
                    <div className='px-1'></div>
                    <TabelHiddenColumn
                        allColumns={allColumns} />
                </div>
            </div>
            <Table
                getTableProps={getTableProps}
                prepareRow={prepareRow}
                getTableBodyProps={getTableBodyProps}
                headerGroups={headerGroups}
                page={page} />


            {/* <div>
                <button onClick={() => gotoPage(0)} disabled={!canPreviousPage}>
                    {"<<"}
                </button>{" "}
                <button onClick={() => previousPage()} disabled={!canPreviousPage}>
                    Previous
                </button>{" "}
                <button onClick={() => nextPage()} disabled={!canNextPage}>
                    Next
                </button>{" "}
                <button onClick={() => gotoPage(pageCount - 1)} disabled={!canNextPage}>
                    {">>"}
                </button>{" "}
                <span>
                    Page{" "}
                    <strong>
                        {pageIndex + 1} of {pageOptions.length}
                    </strong>{" "}
                </span>
                <span>
                    | Go to page:{" "}
                    <input
                        type="number"
                        defaultValue={pageIndex + 1}
                        onChange={(e) => {
                            const pageNumber = e.target.value
                                ? Number(e.target.value) - 1
                                : 0;
                            gotoPage(pageNumber);
                        }}
                        style={{ width: "50px" }}
                    />
                </span>{" "}
                <select
                    value={pageSize}
                    onChange={(e) => setPageSize(Number(e.target.value))}
                >
                    {[10, 25, 50].map((pageSize) => (
                        <option key={pageSize} value={pageSize}>
                            Show {pageSize}
                        </option>
                    ))}
                </select>
            </div> */}

            <TabelFooter
                gotoPage={gotoPage}
                pageIndex={pageIndex}
                pageOptions={pageOptions}
                canPreviousPage={canPreviousPage}
                previousPage={previousPage}
                canNextPage={canNextPage}
                nextPage={nextPage} />
        </div>
    );
}

export default Category;

if (document.getElementById('part_category')) {
    ReactDOM.render(<Category />, document.getElementById('part_category'));
}
