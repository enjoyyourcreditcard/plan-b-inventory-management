import React from 'react';
import ReactDOM from 'react-dom';
import { useTable, usePagination, useGlobalFilter } from 'react-table'


function GlobalFilter({
    preGlobalFilteredRows,
    globalFilter,
    setGlobalFilter,
}) {
    const count = preGlobalFilteredRows.length
    const [value, setValue] = React.useState(globalFilter)
    const onChange = useAsyncDebounce(value => {
        setGlobalFilter(value || undefined)
    }, 200)

    return (
        <span>
            Search:{' '}
            <input
                value={value || ""}
                onChange={e => {
                    setValue(e.target.value);
                    onChange(e.target.value);
                }}
                placeholder={`${count} records...`}
                style={{
                    fontSize: '1.1rem',
                    border: '0',
                }}
            />
        </span>
    )
}


function Example() {

    const data = React.useMemo(
        () => [
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
            {
                col1: 'tesss',
                col2: 'World',
            },
            {
                col1: 'tesss',
                col2: 'rocks',
            },
            {
                col1: 'tesss',
                col2: 'you want',
            },
        ],
        []
    )
    const columns = React.useMemo(

        () => [
            {
                Header: 'Column 1',
                accessor: 'col1',
                Cell: tableProps => (
                    // <h1>{tableProps.row.original.}</h1>

                    // <img
                    //   src={tableProps.row.original.col1}
                    //   width={60}
                    //   alt='Player'
                    // />
                    <>
                        <div id="thumbwrap">
                            <a class="thumb" href="#"><img src="http://www.websitecodetutorials.com/code/images/jamie-small1.jpg" alt="" width={25} height={25} />
                                <span>
                                    <img src="http://www.websitecodetutorials.com/code/images/jamie-small1big.jpg" alt="" />
                                </span>
                            </a>
                        </div>
                        <a href='#' className="text-primary">{tableProps.row.original.col1}</a>

                    </>

                )
            },
            {
                Header: 'Column 2',
                accessor: 'col2',
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
        canPreviousPage,
        pageOptions,
        nextPage,
        previousPage,
        setGlobalFilter
    } = useTable(
        {
            columns,
            data
        },
        useGlobalFilter, usePagination
    )

    const { globalFilter, pageIndex } = state


    return (
        <div className="col-12">
            <div className="card">
                <div className="card-header">
                    <h3 className="card-title">Invoices</h3>
                </div>
                <div className="card-body border-bottom py-3">
                    <div className="d-flex">
                        <div className="text-muted">
                            Show
                            <div className="mx-2 d-inline-block">
                                <input type="text" className="form-control form-control-sm" value="8" size="3" aria-label="Invoices count" />
                            </div>
                            entries
                        </div>
                        <div className="ms-auto text-muted">
                            Search:
                            <div className="ms-2 d-inline-block">
                                <input type="text" className="form-control form-control-sm" aria-label="Search invoice" value={globalFilter} onChange={(e) => setGlobalFilter(e.target.value)} />
                            </div>
                        </div>
                    </div>
                </div>
                <div className="table-responsive">
                    <table {...getTableProps()} className="table card-table table-vcenter text-nowrap datatable">
                        <thead>
                            {headerGroups.map(headerGroup => (
                                <tr {...headerGroup.getHeaderGroupProps()}>
                                    {headerGroup.headers.map(column => (
                                        <th {...column.getHeaderProps()}>{column.render('Header')}</th>
                                    ))}
                                </tr>
                            ))}
                        </thead>
                        <tbody {...getTableBodyProps()}>
                            {page.map((row, i) => {
                                prepareRow(row)
                                return (
                                    <tr {...row.getRowProps()}>
                                        {row.cells.map(cell => {
                                            return <td {...cell.getCellProps()}>{cell.render('Cell')}</td>
                                        })}
                                    </tr>
                                )
                            })}
                        </tbody>
                    </table>
                </div>


                <div className="card-footer d-flex align-items-center">
                    <p className="m-0 ">Showing <span>{pageIndex + 1}</span>  of <span>{pageOptions.length}</span> entries</p>
                    <ul className="pagination m-0 ms-auto">
                        <li className="page-item ">
                            <button disabled={!canPreviousPage} onClick={() => previousPage()} className="page-link" href="#" tabindex="-1" aria-disabled="true">

                                <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="15 6 9 12 15 18"></polyline></svg>
                                prev
                            </button>
                        </li>
                        <li className="page-item"><a className="page-link" href="#">1</a></li>
                        <li className="page-item active"><a className="page-link" href="#">2</a></li>
                        <li className="page-item"><a className="page-link" href="#">3</a></li>
                        <li className="page-item"><a className="page-link" href="#">4</a></li>
                        <li className="page-item"><a className="page-link" href="#">5</a></li>
                        <li className="page-item">
                            <button disabled={!canNextPage} className="page-link" href="#" onClick={() => nextPage()}>
                                next
                                <svg xmlns="http://www.w3.org/2000/svg" className="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="9 6 15 12 9 18"></polyline></svg>
                            </button>
                        </li>
                    </ul>
                </div>
              
            </div>
        </div>
    );
}

export default Example;

if (document.getElementById('example')) {
    ReactDOM.render(<Example />, document.getElementById('example'));
}
