function Table(props) {
    return (
        <>
            <div className="intro-y col-span-12 overflow-auto 2xl:overflow-visible" style={{ maxHeight: '50vh' }}>
                <table
                    {...props.getTableProps()}
                    // style={{ position: "relative", borderCollapse: "collapse" }}
                    className="table table-report -mt-2 overflow-scroll w-full"
                >
                    <thead className="sticky top-0 z-50 bg-slate-100">
                        {props.headerGroups.map((headerGroup) => (
                            <tr {...headerGroup.getHeaderGroupProps()}>
                                {headerGroup.headers.map((column) => (
                                    <th
                                        className="whitespace-nowrap uppercase"
                                        {...column.getHeaderProps(
                                            column.getSortByToggleProps()
                                        )}
                                    >
                                        {column.render("Header")}
                                    </th>
                                ))}
                            </tr>
                        ))}
                    </thead>
                    <tbody {...props.getTableBodyProps()}>
                        {props.page == "" ? (
                            <>
                                <tr>
                                    <td
                                        colSpan="100%"
                                        style={{ textAlign: "center" }}
                                    >
                                        No records found
                                    </td>
                                </tr>
                            </>
                        ) : (
                            props.page.map((row, i) => {
                                props.prepareRow(row);
                                return (
                                    <tr {...row.getRowProps()} className="intro-x">
                                        {row.cells.map((cell) => {
                                            return (
                                                <td
                                                    {...cell.getCellProps()}
                                                    className="align-middle"
                                                    style={{ fontSize: "12px" }}
                                                >
                                                    {cell.render("Cell")}
                                                </td>
                                            );
                                        })}
                                    </tr>
                                );
                            })
                        )}
                    </tbody>
                </table>
            </div>
            {/* <div className="overflow-x">
              
            </div> */}
        </>
    );
}

export default Table;
