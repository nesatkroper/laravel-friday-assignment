<x-layout>
    <form action="{{ route('customers.store') }}" method="post">
        @csrf
        <div class="card card-success card-outline mb-4">
            <div class="card-header">
                <div class="card-title">Create New Customer</div>
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
                        ></textarea>
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
                                name="country"
                                class="form-control"
                                placeholder="Cambodia"
                            />
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success">Submit</button>
                <a
                    href="{{ route('customers.index') }}"
                    class="btn btn-secondary ms-2"
                    >Cancel</a
                >
            </div>
        </div>
    </form>
</x-layout>
