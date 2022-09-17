function Table(props) {
    return (<>
        <div className="table-responsive mb-3">
            <table {...props.getTableProps()} className="table table-borderless" >
                <thead >
                    {props.headerGroups.map(headerGroup => (
                        <tr {...headerGroup.getHeaderGroupProps()}>
                            {headerGroup.headers.map(column => (
                                <th class="w-1" {...column.getHeaderProps(column.getSortByToggleProps())}><b>{column.render('Header')}</b>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-sm text-dark icon-thick" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"></path><polyline points="6 15 12 9 18 15"></polyline></svg>
                                </th>
                            ))}
                        </tr>
                    ))}
                </thead>
                <tbody {...props.getTableBodyProps()}>
                    
                    {props.page.map((row, i) => {
                    props.prepareRow(row)
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
    </>);
}

export default Table;