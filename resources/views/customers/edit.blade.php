<x-layout>
    <form
        action="{{ route('customers.update', $customer->customer_id) }}"
        method="post"
    >
        @csrf @method('PATCH')
        <div class="card card-warning card-outline mb-4">
            <div class="card-header">
                <div class="card-title">Update Customer Information</div>
            </div>
            <div class="card-body">
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >First Name</label
                        >
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{$customer->first_name}}"
                                class="form-control"
                                placeholder="Sok"
                                name="first_name"
                            />
                        </div>
                        @error('first_name')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Last Name</label
                        >
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{$customer->last_name}}"
                                class="form-control"
                                name="last_name"
                                placeholder="San"
                            />
                        </div>
                        @error('last_name')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                </div>
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Phone Number</label
                        >
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{$customer->phone_number}}"
                                class="form-control"
                                name="phone_number"
                                placeholder="012 345 xxx"
                            />
                        </div>
                        @error('phone_number')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label">E-Mail</label>
                        <div class="input-group">
                            <input
                                type="email"
                                value="{{$customer->email}}"
                                name="email"
                                class="form-control"
                                placeholder="example@example.com"
                            />
                            <span class="input-group-text" id="basic-addon2"
                                >@example.com</span
                            >
                        </div>

                        @error('email')
                        <span class="form-text text-danger">{{
                            $message
                        }}</span>
                        @enderror
                    </div>
                </div>
                <!--  -->
                <div class="d-flex flex-column w-100">
                    <label for="basic-url" class="form-label">Address</label>
                    <div class="input-group mb-3">
                        <textarea
                            name="address"
                            class="form-control"
                            placeholder="puok, puok,puok,siem reap ..."
                            col="3"
                            >{{$customer->address}}</textarea
                        >
                    </div>
                    @error('address')
                    <span class="form-text text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label">City</label>
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{ $customer -> city }}"
                                name="city"
                                class="form-control"
                                placeholder="Siem Reap"
                            />
                        </div>
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label">State</label>
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{$customer->state}}"
                                name="state"
                                class="form-control"
                                placeholder="Cambodia"
                            />
                        </div>
                    </div>
                </div>
                <!--  -->
                <div class="mb-3 gap-2 d-flex flex-row">
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Postal Code</label
                        >
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{$customer->postal_code}}"
                                name="postal_code"
                                class="form-control"
                                placeholder="1710"
                            />
                        </div>
                    </div>
                    <div class="d-flex flex-column w-100">
                        <label for="basic-url" class="form-label"
                            >Country</label
                        >
                        <div class="input-group">
                            <input
                                type="text"
                                value="{{$customer->country}}"
                                name="country"
                                class="form-control"
                                placeholder="Cambodia"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-warning">Submit</button>
                <a
                    href="{{ route('customers.index') }}"
                    class="btn btn-secondary ms-2"
                    >Cancel</a
                >
            </div>
        </div>
    </form>
</x-layout>
