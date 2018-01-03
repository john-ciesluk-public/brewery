<div class="modal fade" id="ageModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center">The Deer House</h4>
            </div>
            <div class="modal-body text-center">
                <button type="button" class="btn btn-tan btn-padded btn-twentyone" data-dismiss="modal">I am over 21 years old</button>
                <a type="button" class="btn btn-red btn-padded" href="{{ url('') }}">I am under 21 years old</a>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="eventsModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content events-modal-body modal-body well well-light dark-text dark-link text-center">
            <h2 class="modal-title" id="events-modal-title"></h2>
            <hr />
            <p class="modal-description" align="justify" id="events-modal-description"></p>
        </div>
    </div>
</div>
<div class="modal fade" id="unsubscribeModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aira-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <div class="modal-content unsubscribe-modal-body modal-body well text-center">
            <h2 class="modal-title">Unsubscribe</h2>
            <hr />
            <p class="modal-description" align="justify">
                <form class="form-inline" id="unsubscribe-form">
                    {!! csrf_field() !!}
                    <div class="alert alert-warning alert-unsubscribe" role="alert" style="display:none;"></div>
                    <div class="input-group">
                        <div class="input-group-addon">Email</div>
                        <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                        <span class="input-group-btn">
                            <button type="submit" class="btn btn-tan btn-unsubscribe">
                                <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </button>
                        </span>
                    </div>
                </form>
            </p>
        </div>
    </div>
</div>
