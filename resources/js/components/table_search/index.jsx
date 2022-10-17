import { useEffect, useState } from "react";
import Api from "../../utils/api";

const SearchSelectCategory = (props) => {
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const api = new Api();
    useEffect(async () => {
        async function getData() {
            api.getCategorySelect().then((response) => {
                setRawData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    });

    return (
        <select
            className="form-control"
            onChange={(e) =>
                props.SearchFilter(e.target.value, props.searchColumnID)
            }
        >
            <option>All</option>
            {rawData.map((item, i) => {
                return (
                    <option key={i} name={item}>
                        {item}
                    </option>
                );
            })}
        </select>
    );
};

const SearchSelectBrand = (props) => {
    const [rawData, setRawData] = useState([]);
    const [loadingData, setLoadingData] = useState(true);
    const api = new Api();
    useEffect(async () => {
        async function getData() {
            api.getBrandSelect().then((response) => {
                setRawData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    });

    return (
        <select
            className="form-control"
            onChange={(e) =>
                props.SearchFilter(e.target.value, props.searchColumnID)
            }
        >
            <option>All</option>
            {rawData.map((item, i) => {
                return (
                    <option key={i} name={item}>
                        {item}
                    </option>
                );
            })}
        </select>
    );
};

const SearchSelectSN = (props) => {
    return (
        <select
            className="form-control"
            onChange={(e) =>
                props.SearchFilter(e.target.value, props.searchColumnID)
            }
        >
            <option>All</option>
            <option>SN</option>
            <option>NON SN</option>
        </select>
    );
};

function TableSearch(props) {
    // const [searchColumn, setSearchColumn] = useState(props.columns[0].Header);
    const [search, setSearch] = useState("");
    const [searchColumnID, setSearchColumnID] = useState(
        props.columns[0].accessor
    );
    const [column, setColumn] = useState(props.columns);

    const changeColumn = (el) => {
        // setSearchColumn(item.Header),
        setSearchColumnID(el.target.value),
            setSearch(""),
            // console.log(SearchColumnID)

            props.resetSearchFilter();
    };

    return (
        <>
            <div class="flex w-full sm:w-auto">
                <div class="w-48 relative text-slate-500">
                    {searchColumnID === "category" ||
                    searchColumnID === "category_name" ? (
                        <SearchSelectCategory
                            searchColumnID={searchColumnID}
                            SearchFilter={props.SearchFilter}
                        />
                    ) : searchColumnID === "brand" ||
                      searchColumnID === "brand_name" ? (
                        <SearchSelectBrand
                            searchColumnID={searchColumnID}
                            SearchFilter={props.SearchFilter}
                        />
                    ) : searchColumnID === "sn_status" ? (
                        <SearchSelectSN
                            searchColumnID={searchColumnID}
                            SearchFilter={props.SearchFilter}
                        />
                    ) : (
                        <>
                            <input
                                type="text"
                                value={search}
                                onChange={(e) => (
                                    props.SearchFilter(
                                        e.target.value,
                                        searchColumnID
                                    ),
                                    setSearch(e.target.value)
                                )}
                                class="form-control w-48 box pr-10"
                                placeholder="Search by invoice..."
                            />

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
                                icon-name="search"
                                class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                                data-lucide="search"
                            >
                                <circle cx="11" cy="11" r="8"></circle>
                                <line
                                    x1="21"
                                    y1="21"
                                    x2="16.65"
                                    y2="16.65"
                                ></line>
                            </svg>
                        </>
                    )}
                </div>
                <select class="form-select box ml-2" onChange={changeColumn}>
                    {column.map((item, i) => {
                        return (
                            <option value={item.accessor}>{item.Header}</option>
                        );
                    })}
                </select>
            </div>
            {/* <div className="ms-auto text-muted mb-3">
                <div class="input-group">
                    {searchColumnID === "category" || searchColumnID === "category_name" ? <SearchSelectCategory searchColumnID={searchColumnID} SearchFilter={props.SearchFilter} />
                        :  searchColumnID === "brand"  || searchColumnID === "brand_name"? 
                        <SearchSelectBrand searchColumnID={searchColumnID} SearchFilter={props.SearchFilter} />
                        :  searchColumnID === "sn_status" ?
                        <SearchSelectSN searchColumnID={searchColumnID} SearchFilter={props.SearchFilter} />
                        :
                        <input type="text" class="form-control" placeholder="Search…" value={search} onChange={(e) => (props.SearchFilter(e.target.value, searchColumnID), setSearch(e.target.value))} />
                    }
                    <button data-bs-toggle="dropdown" type="button" class="btn dropdown-toggle ">{searchColumn}</button>
                    <div class="dropdown-menu dropdown-menu-end">
                        {column.map((item, i) => {
                            return (
                                <button class="dropdown-item" href="#" onClick={(e) => (setSearchColumn(item.Header), setSearchColumnID(item.accessor), setSearch(""), props.resetSearchFilter())}>
                                    {item.Header}
                                </button>)
                        })}
                    </div>
                </div>
            </div> */}

            {/* <div class="w-56 relative text-slate-500">
                <input
                    type="text"
                    class="form-control w-56 box pr-10"
                    placeholder="Search…"
                    value={search}
                    onChange={(e) => (
                        props.SearchFilter(e.target.value, searchColumnID),
                        setSearch(e.target.value)
                    )}
                />
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
                    icon-name="search"
                    class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                    data-lucide="search"
                >
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                </svg>
            </div> */}
        </>
    );
}

export default TableSearch;
