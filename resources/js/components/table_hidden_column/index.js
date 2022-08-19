function TabelHiddenColumn(props) {
    return (
        <>
            <div class="btn-group h-25 ">
                <button type="button" class=" btn btn-outline-light  dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-adjustments" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
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
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    {props.allColumns.map(column => (
                        <button class="dropdown-item" href="#"><input type="checkbox" {...column.getToggleHiddenProps()} />&nbsp; {column.Header}</button>
                    ))}

                </div>
            </div>
        </>
    );
}

export default TabelHiddenColumn;