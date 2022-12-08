import React, { useEffect, useState } from "react";
import Select from "react-select";
import ReactDOM from "react-dom";
import Api from "../../utils/api";

function simpleArraySum(ar) {
    var sum = 0;
    for (var i = 0; i < ar.length; i++) {
        sum += parseInt(ar[i]);
    }
    return sum;
}

function TransactionForm(props) {
    const api = new Api();
    const [loadingData, setLoadingData] = useState(true);
    const [data, setData] = useState([]);
    const [selectQty, setSelectQty] = useState([]);
    const [part, setPart] = useState([]);
    const [qty, setQty] = useState([]);
    const [brand, setBrand] = useState([]);
    const [brandOption, setBrandOption] = useState([]);
    const [error, setError] = useState([]);
    const [totalQty, setTotalQty] = useState([]);
    // const [totalQty, setTotalQty] = useState();

    useEffect(() => {
        async function getData() {
            api.getRequestFormByGRF(props.grfcode).then((response) => {
                var selectQtyRaw = [];
                var parts = [];
                var brandOption_raw = [];
                var qty_raw = [];
                var brand_raw = [];
                var error_raw = [];
                var totalQty_raw = [];
                for (let i = 0; i < response.data.data.length; i++) {
                    selectQtyRaw[i] = 1;
                    parts[i] = [];
                    brandOption_raw[i] = [[[{id:null,name:"select option"}]]];
                    qty_raw[i] = [];
                    brand_raw[i] = [];
                    error_raw[i] = false;
                    totalQty_raw[i] = 0;
                }
                setPart(parts);
                setQty(qty_raw);
                setBrand(brand_raw);
                setError(error_raw);
                setTotalQty(totalQty_raw);
                setBrandOption(brandOption_raw);
                setSelectQty(selectQtyRaw);
                setData(response.data.data);
                setLoadingData(false);
            });
        }
        if (loadingData) {
            getData();
        }
    }, []);

    const addSelect = (index) => {

        let newBrandOption = brandOption.slice();

        newBrandOption[index].push([[{id:null, name:"Select Option"}]]);
        // console.log(newBrandOption[0])
        setBrandOption(newBrandOption);
    
        let newSelectQty = [...selectQty];
        newSelectQty[index] = selectQty[index] + 1;
        setSelectQty(newSelectQty);

        
    };

    const changePart = (event, index, i) => {

        var brand = brandOption.slice();
        brand[index][i] = [data[index].segment.parts.find(o => o.name === event.value).brand];
        setBrandOption(brand)
        // console.log(brandOption[0][0][0]  )

        // if (typeof brand[index][i][0].length === "undefined") {
        //     ;
        // }else{
        //     setBrandOption(brand[0]);
        //     console.log(brand[0]);

        // }

        var parts = part.slice();
        parts[index][i] = event.value;
        setPart(parts);
    };

    const changeBrand = (event, index, i) => {
        var brands = brand.slice();
        brands[index][i] = event.value;
        setBrand(brands);
    };
    const changeQuantity = (event, index, i, max) => {
        var qty_raw = qty.slice();
        var error_raw = error.slice();
        var total_raw = totalQty.slice();
        qty_raw[index][i] = parseInt(event.target.value);
        setQty(qty_raw);
        var total = simpleArraySum(qty[index]);
        total_raw[index] = isNaN(total) ? 0 : total;
        setTotalQty(total_raw);

        if (simpleArraySum(qty[index]) > parseInt(max)) {
            error_raw[index] = true;
            setError(error_raw);
        } else {
            error_raw[index] = false;
            setError(error_raw);
        }
    };

    const handleClickSubmit = (event) => {
        event.preventDefault();
        const margeParts = [];
        const margeBrands = [];
        const margeQty = [];

        for (let i = 0; i < part.length; i++) {
            margeParts.push(...part[i]);
            margeBrands.push(...brand[i]);
            margeQty.push(...qty[i]);
        }

        api.postTransactionApprovedIC(props.grf_id, margeParts,margeBrands, margeQty).then(
            (response) => {
                window.location.replace(
                    "http://localhost:8000/transaction/outbound"
                );
            }
        );
    };
    return (
        <>
            <div className="intro-y box p-5">
                <form onSubmit={handleClickSubmit}>
                    <div className="border-solid">
                        <table class="table border ">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="col-1">SEGMENT</th>
                                    <th class="col-2">PART </th>
                                    <th class="col-2">Brand </th>
                                    <th class="col-2">QTY</th>
                                    <th class="col-10">APPROVE QTY</th>
                                </tr>
                            </thead>
                            <tbody>
                                {data.map((item, index) => {
                                    return (
                                        <tr>
                                            <td class="!pr-2">{index + 1}.</td>
                                            <td
                                                class=""
                                                style={{ fontSize: 12 }}
                                            >
                                                {item.segment.name}
                                            </td>
                                            <td
                                                class="!px-2"
                                                style={{ width: 250 }}
                                            >
                                                {[
                                                    ...Array(selectQty[index]),
                                                ].map((x, i) => (
                                                    <Select
                                                        onChange={(e) =>
                                                            changePart(
                                                                e,
                                                                index,
                                                                i,

                                                            )
                                                        }
                                                        className="part_id mt-2"
                                                        options={item.segment.parts.map(
                                                            (d) => ({
                                                                value: d.name,
                                                                label: d.name,
                                                            })
                                                        )}
                                                        key={i}
                                                    />
                                                ))}
 
                                                <button
                                                    type="button"
                                                    onClick={() =>
                                                        addSelect(index)
                                                    }
                                                >
                                                    Tambah +
                                                </button>
                                            </td>
                                            <td
                                                class="!px-2"
                                                style={{ width: 250 }}
                                            >
                                                {[
                                                    ...Array(selectQty[index]),
                                                ].map((x, i) => (
                                                    <Select
                                                        onChange={(e) =>
                                                            changeBrand(
                                                                e,
                                                                index,
                                                                i
                                                            )
                                                        }
                                                        className="part_id mt-2 "
                                                        isDisabled={brandOption[index][i][0].id === null}
                                                        options={brandOption[index][i][0].map(
                                                            (d) => ({
                                                                value: d.id,
                                                                label: d.name,
                                                            })
                                                        )}

                                                        key={i}
                                                    />
                                                ))}

                                                <div className="pt-5"></div>
                                            </td>

                                            <td class="!px-2">
                                                <p>{item.quantity}</p>
                                            </td>
                                            <td class="!px-2">
                                                {[
                                                    ...Array(selectQty[index]),
                                                ].map((x, i) => (
                                                    <input
                                                        onChange={(e) =>
                                                            changeQuantity(
                                                                e,
                                                                index,
                                                                i,
                                                                item.quantity
                                                            )
                                                        }
                                                        name="quantity"
                                                        id="crud-form-1"
                                                        type="number"
                                                        class="form-control w-full quantity_part mt-2"
                                                    />
                                                ))}

                                                <p>Total : {totalQty[index]}</p>
                                                {error[index] ? (
                                                    <p className="text-danger">
                                                        Data tidak boleh lebih
                                                        dari {item.quantity}
                                                    </p>
                                                ) : (
                                                    ""
                                                )}
                                            </td>
                                        </tr>
                                    );
                                })}
                            </tbody>
                        </table>
                    </div>
                    <div class="text-right mt-5">
                    {/* http://localhost:8000/transaction/reject/IC */}
                        <a
                        href={"/transaction/reject/IC?id="+props.id}
                            type="button"
                            class="btn btn-outline-danger w-24 mr-1"
                        >
                            Reject
                        </a>
                        <button type="submit" class="btn btn-primary w-24">
                            Approve
                        </button>
                    </div>
                </form>
            </div>
        </>
    );
}

if (document.getElementById("transaction-ic-form")) {
    const propsContainer = document.getElementById("transaction-ic-form");
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(
        <TransactionForm {...props} />,
        document.getElementById("transaction-ic-form")
    );
}
