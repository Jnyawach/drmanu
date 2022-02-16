<div>
    <section class="pt-5">
        <div class="row">
            <div class="col-11 p-5">
                <p>Our team is always dedicated to researching and providing high-quality content to
                    our readers. We go the extra mile to ensure that the content is up-to-date, accurate,
                    complete, and clear. Whenever we are alerted of any content that does not meet the standards mentioned by us.
                    Our research team takes immediate action by researching the content
                    further and determining further improvements before republishing the content.</p>
                <p>Dr. Manu Website resources and contents are for informational purposes only.
                    Please note that we do not provide any medical advice, diagnosis, or treatment.
                    In case of a medical emergency consult with your physician or the nearest medical facility.</p>
                <p>For advertising and sponsorship please contact us via
                    <span>advertising@drmanu.com</span>
                </p>
            </div>
        </div>

        <div class="row">
            <div class="col-12 col-md-8 p-5">

                <h2>Send Us a Message</h2>
                <form class="mt-5" wire:submit.prevent="createMessage">
                    @honeypot
                    <div class="form-group required m-2">
                        <label class="control-label" for="userName">
                            Your Name:
                        </label>
                        <input type="text" id="userName" name="userName" class="form-control"
                        wire:model="name">
                        @error('name') <span class="error">{{ $message }}</span> @enderror<br>
                        <small>Please enter your first and last name</small>
                    </div>
                    <div class="form-group required m-2 mt-4">
                        <label class="control-label" for="userEmail">
                            Your Email:
                        </label>
                        <input type="text" id="userEmail" name="userEmail" class="form-control"
                        wire:model="email">
                        @error('email') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group required m-2 mt-4">
                        <label class="control-label" for="subject">
                            Subject:
                        </label>
                        <input type="text" id="subject" name="subject" class="form-control"
                        wire:model="subject">
                        @error('subject') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group required m-2 mt-4">
                        <label class="control-label" for="message">
                            Your Message:
                        </label>
                        <textarea id="message" name="subject" class="form-control" rows="6" wire:model="message"></textarea>
                        @error('message') <span class="error">{{ $message }}</span> @enderror<br>
                        <small>Please note that due to bulk volume of messages we receive we may take longer than expected
                            to reply to your message. Our team will act on it and do everything they can to respond in time</small>

                    </div>
                    <div class="form-group required m-2 mt-4">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                    @if($success)
                        <div class="alert alert-success mt-2">Thank you for contacting us. We have received your message</div>
                    @endif
                </form>
            </div>
        </div>
    </section>
</div>
