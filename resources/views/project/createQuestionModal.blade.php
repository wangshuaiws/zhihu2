<div class="col-md-10 col-md-offset-1">
    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title text-center" id="myModalLabel">写下你的问题</h3>
                    <h5 class="modal-title text-center" style="color: #8590a6">描述精确的问题更易得到解答</h5>
                </div>
                <div class="modal-body">
                    {!! Form::open(['route'=>'question.store','method'=>'POST','files'=>'true']) !!}
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::text('title',null,['class'=>'form-control','value'=>"{{ old('title') }}",'placeholder' => '问题标题']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>
                    <div class="form-group">
                        {!! Form::select('topics',[],null,['class'=>'form-control js-example-placeholder-multiple','name' => 'topics[]','placeholder' => '添加话题','multiple' => 'multiple']) !!}
                    </div>

                    <div class="form-group{{ $errors->has('body') ? ' has-error' : '' }}">
                        {!! Form::label('body','问题描述 :',['class'=>'control-label']) !!}
                        {!! Form::textarea('body',null,['class'=>'form-control','rows'=>'4','value'=>"{{ old('content') }}",'placeholder' => '问题背景、条件等详细信息']) !!}
                        @if ($errors->has('title'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    {!! Form::submit('提交问题',['class'=>'btn btn-primary center-block']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/select2.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        function formatTopic(topic) {
            return "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" +
            topic.name ? topic.name : "Laravel" +
            "</div></div></div>";
        }
        function formatTopic(topic) {
            return "<div class='select2-result-repository clearfix'>" +
            "<div class='select2-result-repository__meta'>" +
            "<div class='select2-result-repository__title'>" +
            topic.name ? topic.name : "Laravel" +
            "</div></div></div>";
        }
        function formatTopicSelection(topic) {
            return topic.name || topic.text;
        }
        $(".js-example-placeholder-multiple").select2({
            tags: true,
            placeholder: '选择相关话题',
            minimumInputLength: 2,
            ajax: {
                url: '/api/topics',
                dataType: 'json',
                delay: 250,
                data: function (params) {
                    return {
                        q: params.term
                    };
                },
                processResults: function (data, params) {
                    return {
                        results: data
                    };
                },
                cache: true
            },
            templateResult: formatTopic,
            templateSelection: formatTopicSelection,
            escapeMarkup: function (markup) {
                return markup;
            }
        });
    });
</script>