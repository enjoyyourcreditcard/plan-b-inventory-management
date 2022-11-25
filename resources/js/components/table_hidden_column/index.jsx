function TabelHiddenColumn(props) {
    return (
        <>
            <div className="dropdown">
                <button
                    className="dropdown-toggle btn px-2 box"
                    aria-expanded="false"
                    data-tw-toggle="dropdown"
                >
                    <span className="w-5 h-5 flex items-center justify-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            className="icon icon-tabler icon-tabler-adjustments"
                            width="24"
                            height="24"
                            viewBox="0 0 24 24"
                            strokeWidth="2"
                            stroke="currentColor"
                            fill="none"
                            strokeLinecap="round"
                            strokeLinejoin="round"
                        >
                            <path
                                stroke="none"
                                d="M0 0h24v24H0z"
                                fill="none"
                            ></path>
                            <circle cx="6" cy="10" r="2"></circle>
                            <line x1="6" y1="4" x2="6" y2="8"></line>
                            <line x1="6" y1="12" x2="6" y2="20"></line>
                            <circle cx="12" cy="16" r="2"></circle>
                            <line x1="12" y1="4" x2="12" y2="14"></line>
                            <line x1="12" y1="18" x2="12" y2="20"></line>
                            <circle cx="18" cy="7" r="2"></circle>
                            <line x1="18" y1="4" x2="18" y2="5"></line>
                            <line x1="18" y1="9" x2="18" y2="20"></line>
                        </svg>
                    </span>
                </button>
                <div className="dropdown-menu w-40">
                    <ul className="dropdown-content">
                        {props.allColumns.map((column) => (
                            <li key={column.id}>
                                <button className="dropdown-item" href="#">
                                    <input
                                        type="checkbox"
                                        {...column.getToggleHiddenProps()}
                                    />
                                    &nbsp; {column.Header}
                                </button>
                            </li>
                        ))}
                    </ul>
                    {/* {props.allColumns.map(column => (<li key={column.id}><button className="dropdown-item" href="#"><input type="checkbox" {...column.getToggleHiddenProps()} />&nbsp; {column.Header}</button><li key={column.id}>))} */}
                    {/* <ul className="dropdown-content">
                             
                            <li key={column.id}>
                                <a href="" className="dropdown-item">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        icon-name="printer"
                                        data-lucide="printer"
                                        className="lucide lucide-printer w-4 h-4 mr-2"
                                    >
                                        <polyline points="6 9 6 2 18 2 18 9"></polyline>
                                        <path d="M6 18H4a2 2 0 01-2-2v-5a2 2 0 012-2h16a2 2 0 012 2v5a2 2 0 01-2 2h-2"></path>
                                        <rect
                                            x="6"
                                            y="14"
                                            width="12"
                                            height="8"
                                        ></rect>
                                    </svg>{" "}
                                    Print
                                </a>
                            </li>
                            <li key={column.id}>
                                <a href="" className="dropdown-item">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        icon-name="file-text"
                                        data-lucide="file-text"
                                        className="lucide lucide-file-text w-4 h-4 mr-2"
                                    >
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line
                                            x1="16"
                                            y1="13"
                                            x2="8"
                                            y2="13"
                                        ></line>
                                        <line
                                            x1="16"
                                            y1="17"
                                            x2="8"
                                            y2="17"
                                        ></line>
                                        <line
                                            x1="10"
                                            y1="9"
                                            x2="8"
                                            y2="9"
                                        ></line>
                                    </svg>{" "}
                                    Export to Excel
                                </a>
                            </li>
                            <li key={column.id}>
                                <a href="" className="dropdown-item">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        width="24"
                                        height="24"
                                        viewBox="0 0 24 24"
                                        fill="none"
                                        stroke="currentColor"
                                        strokeWidth="2"
                                        strokeLinecap="round"
                                        strokeLinejoin="round"
                                        icon-name="file-text"
                                        data-lucide="file-text"
                                        className="lucide lucide-file-text w-4 h-4 mr-2"
                                    >
                                        <path d="M14.5 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V7.5L14.5 2z"></path>
                                        <polyline points="14 2 14 8 20 8"></polyline>
                                        <line
                                            x1="16"
                                            y1="13"
                                            x2="8"
                                            y2="13"
                                        ></line>
                                        <line
                                            x1="16"
                                            y1="17"
                                            x2="8"
                                            y2="17"
                                        ></line>
                                        <line
                                            x1="10"
                                            y1="9"
                                            x2="8"
                                            y2="9"
                                        ></line>
                                    </svg>{" "}
                                    Export to PDF
                                </a>
                            </li>
                        </ul> */}
                </div>
            </div>
            {/* <div className="btn-group h-25 ">
                <button type="button" className=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" className="icon icon-tabler icon-tabler-adjustments" width="24" height="24" viewBox="0 0 24 24" strokeWidth="2" stroke="currentColor" fill="none" strokeLinecap="round" strokeLinejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <circle cx="6" cy="10" r="2"></circle>
                        <line x1="6" y1="4" x2="6" y2="8"></line>
                        <line x1="6" y1="12" x2="6" y2="20"></line>
                        <circle cx="12" cy="16" r="2"></circle>
                        <line x1="12" y1="4" x2="12" y2="14"></line>
                        <line x1="12" y1="18" x2="12" y2="20"></line>
                        <circle cx="18" cy="7" r="2"></circle>
                        <line x1="18" y1="4" x2="18" y2="5"></line>
                        <line x1="18" y1="9" x2="18" y2="20"></line>
                    </svg>
                </button>
                <div className="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    {props.allColumns.map(column => (
                        <button className="dropdown-item" href="#"><input type="checkbox" {...column.getToggleHiddenProps()} />&nbsp; {column.Header}</button>
                    ))}

                </div>
            </div> */}
        </>
    );
}

export default TabelHiddenColumn;
