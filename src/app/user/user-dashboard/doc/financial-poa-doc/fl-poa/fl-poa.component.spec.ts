import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FlPoaComponent } from './fl-poa.component';

describe('FlPoaComponent', () => {
  let component: FlPoaComponent;
  let fixture: ComponentFixture<FlPoaComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FlPoaComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FlPoaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
