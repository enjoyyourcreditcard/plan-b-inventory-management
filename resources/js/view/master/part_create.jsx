import React, { useEffect, useState } from "react";
import Select from "react-select";
import ReactDOM from "react-dom";
import Api from "../../utils/api";

function CreatePart(props) {
    const api = new Api();
    const [categoryOption, setCategoryOption] = useState([]);
    const [segmentOption, setSegementOption] = useState([]);
    const [brandOption, setBrandOption] = useState([]);
    const [uomOption, setUOMOption] = useState([
        { value: "METER", label: "METER" },
        { value: "SET", label: "SET" },
        { value: "EACH", label: "EACH" },
        { value: "ROLL", label: "ROLL" },
        { value: "UNIT", label: "UNIT" },
        { value: "BATANG", label: "BATANG" },
        { value: "LITER", label: "LITER" },
        { value: "KALENG", label: "KALENG" },
        { value: "KG", label: "KG" },
        { value: "KUBIC", label: "KUBIC" },
        { value: "PACK", label: "PACK" },
    ]);
    const [snStatusOption, setSnStatusOption] = useState([
        { value: "sn", label: "SN" },
        { value: "non sn", label: "NON SN" },
    ]);
    const [colorOption, setCoOption] = useState([
        { value: "Black", label: "Black" },
        { value: "White", label: "White" },
        { value: "Grey", label: "Grey" },
        { value: "Green", label: "Green" },
        { value: "Yellow", label: "Yellow" },
        { value: "NN", label: "NN" },
        { value: "Blue", label: "Blue" },
        { value: "Silver", label: "Silver" },
        { value: "Multi Color", label: "Multi Color" },
        { value: "Red", label: "Red" },
        { value: "Orange", label: "Orange" },
    ]);

    const [nameInput, setNameInput] = useState("");
    const [categoryInput, setCategoryInput] = useState("");
    const [segmentInput, setSegmentInput] = useState("");
    const [brandInput, setBrandInput] = useState("");
    const [uomInput, setUomInput] = useState("");
    const [snStatusInput, setSnStatusInput] = useState("");
    const [colorInput, setColorInput] = useState("");
    const [sizeInput, setSizeInput] = useState("");
    const [descriptionInput, setDescriptionInput] = useState("");
    const [noteInput, setNoteInput] = useState("");

    useEffect(() => {
        let category = [];
        JSON.parse(props.category).map((item) => {
            category.push({ value: item.id, label: item.name });
        });
        setCategoryOption(category);
    }, []);

    const handleChangeCategory = (event) => {
        setCategoryInput(event.value);
        let segment = [];
        api.getSegmentByCategorySelect(event.value).then((response) => {
            response.data.data.map((item) => {
                segment.push({ value: item.id, label: item.name });
            });
        });
        setSegementOption(segment);
    };

    const handleChangeSegment = (event) => {
        setSegmentInput(event.value);
        let brand = [];
        console.log(event.value);
        api.getBrandBySegmentSelect(event.value).then((response) => {
            console.log(response.data.data);
            response.data.data.map((item) => {
                brand.push({ value: item.id, label: item.name });
            });
        });
        setBrandOption(brand);
    };

    const handleSubmit = (e) => {
        e.preventDefault();
        api.postAddPart(
            nameInput,
            categoryInput,
            segmentInput,
            brandInput,
            uomInput,
            snStatusInput,
            colorInput,
            sizeInput,
            descriptionInput,
            noteInput
        ).then((response) => (location.href = "http://localhost:8000/part"));
    };

    return (
        <>
            <div class="mt-5">
                <form onSubmit={handleSubmit}>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Part Name</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input
                                onChange={(e) => setNameInput(e.target.value)}
                                type="text"
                                class="form-control"
                                placeholder="Part name"
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Category</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <Select
                                options={categoryOption}
                                onChange={handleChangeCategory}
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Segment</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <Select
                                options={segmentOption}
                                onChange={handleChangeSegment}
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Brand</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <Select
                                options={brandOption}
                                onChange={(event) => setBrandInput(event.value)}
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Uom</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <Select
                                options={uomOption}
                                onChange={(event) => setUomInput(event.value)}
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">SN Status</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <Select
                                options={snStatusOption}
                                onChange={(event) =>
                                    setSnStatusInput(event.value)
                                }
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Color</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <Select
                                options={colorOption}
                                onChange={(event) => setColorInput(event.value)}
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Size</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input
                                type="number"
                                class="form-control"
                                onChange={(e) => setSizeInput(e.target.value)}
                                required
                            />
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Description</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea
                                onChange={(e) =>
                                    setDescriptionInput(e.target.value)
                                }
                                rows="4"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Your message..."
                            ></textarea>
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Note</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <textarea
                                rows="4"
                                onChange={(e) => setNoteInput(e.target.value)}
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 "
                                placeholder="Your message..."
                            ></textarea>
                        </div>
                    </div>
                    <div class="form-inline items-start flex-col xl:flex-row mt-5 pt-5 first:mt-0 first:pt-0">
                        <div class="form-label xl:w-64 xl:!mr-10">
                            <div class="text-left">
                                <div class="flex items-center">
                                    <div class="font-medium">Part Image</div>
                                </div>
                            </div>
                        </div>
                        <div class="w-full mt-3 xl:mt-0 flex-1">
                            <input
                                class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help"
                                id="file_input"
                                type="file"
                                name="img"
                            />
                            <p
                                class="mt-1 text-sm text-gray-500 dark:text-gray-300"
                                id="file_input_help"
                            >
                                SVG, PNG, JPG
                            </p>
                        </div>
                    </div>
                    <div class="text-right mt-5">
                        <button type="submit" class="btn btn-primary w-24">
                            Save
                        </button>
                    </div>
                </form>
            </div>
        </>
    );
}

if (document.getElementById("master-create-part")) {
    const propsContainer = document.getElementById("master-create-part");
    const props = Object.assign({}, propsContainer.dataset);
    ReactDOM.render(
        <CreatePart {...props} />,
        document.getElementById("master-create-part")
    );
}
